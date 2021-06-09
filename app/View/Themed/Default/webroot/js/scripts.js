//ajax queue, fix IE problem when sorting
(function($) {
  // jQuery on an empty object, we are going to use this as our Queue
  var ajaxQueue = $({});

  $.ajaxQueue = function(ajaxOpts) {
    // hold the original complete function
    var oldComplete = ajaxOpts.complete;

    // queue our ajax request
    ajaxQueue.queue(function(next) {

      // create a complete callback to fire the next event in the queue
      ajaxOpts.complete = function() {
        // fire the original complete if it was there
        if (oldComplete) oldComplete.apply(this, arguments);

        next(); // run the next query in the queue
      };

      // run the query
      $.ajax(ajaxOpts);
    });
  };

})(jQuery);


$('document').ready(function(){
	var overlayer = null;
	var loader=null;
	var searchInterval=1000;
	createOverLayer();
	
	
	
	
	//bind sorting to table th
	$('.thead th').live('click',function(){
		var indexOfTh=($(this).index('.thead th'));
		var nameOfField = $('.tsearch td input');
		
		//get order para
		var orderBy={};
		var name = nameOfField.eq(indexOfTh).attr('name');		
		var val = ($(this).hasClass('asc'))?'desc':'asc';
		eval("orderBy."+name+"='"+val+"'");
				
		//get conditions		
		var searchFields= $('.search');
		var conditions={};
		$.each(searchFields,function(index,value){
			if($(value).val()!=''){
				doSearch=true;
				var name = $(value).attr('name');
				var val =  $(value).val();
				val = escapeQuotes(val);
				eval("conditions."+name+"='"+val+"'");
			}			
		});		
		//alert(conditions.name);
		//load data
		
			
		loadTable('data.php',{op:'table',condition:conditions,order:orderBy});
		loadPager('data.php',{op:'pager',condition:conditions,order:orderBy});
		
	});
	
	//bind searching to searc fields
	var isSeaching = null;
	$('.search').live('keyup',function(){
		  if(isSeaching==null){
			  isSeaching = setTimeout(function() {
					var searchFields= $('.search');
					var conditions={};
					$.each(searchFields,function(index,value){
						if($(value).val()!=''){							
							var name = $(value).attr('name');
							var val =  $(value).val();
							val = escapeQuotes(val);
							eval("conditions."+name+"='"+val+"'");
						}			
					});					
					loadData('data.php',{op:'data',condition:conditions});
					loadPager('data.php',{op:'pager',condition:conditions});
					isSeaching=null;
			   }, searchInterval);
		  }
		  
	});
	
	
	//bind pagination to pagers
	$('.pager').live('click',function(){
		//get conditions		
		var searchFields= $('.search');
		var conditions={};
		$.each(searchFields,function(index,value){
			if($(value).val()!=''){
				doSearch=true;
				var name = $(value).attr('name');
				var val =  $(value).val();
				val = escapeQuotes(val);
				eval("conditions."+name+"='"+val+"'");
			}			
		});
		
		loadTable('data.php?'+$(this).attr('href').split("?")[1],{op:'table',condition:conditions});
		loadPager('data.php?'+$(this).attr('href').split("?")[1],{op:'pager',condition:conditions});
		return false;
	});

	//load table data, it is called whenever searching
	function loadData(postUrl,data){
			jQuery.ajaxQueue({
				  url: postUrl,
				  dataType: 'html',
				  type:'POST',				  
				  data: data,
				  beforeSend : function(){					
				 		showOverLayer();		  
				  },
				  error: function(){
					    alert('Error whild loading data, please refresh and try again');
				  },
				  success: function(dt) {					 
					  $('#view-table').find('tr[class~="tbody"]').remove();					 
					  $('#view-table table tbody').fadeIn(function(){
					  		hideOverLayer();
					  	}).append(dt); 
				  }
			});
		
	}
	
	//load table, this function is called whenever sorting and pagination happens 
	function loadTable(postUrl,dataPost){
		
				jQuery.ajaxQueue({
					  url: postUrl+"?"+Number(new Date()),
					  dataType: 'html',
					  type:'POST',	
					  data: dataPost,
					  cache: false,
					  async: true,				
					  beforeSend : function(){					
					 		showOverLayer();		  
					  },
					  error:function(xhr, status, errorThrown) {
				            alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
				      },			  
					  success: function(dt) {
						  $('#view-table').fadeIn(function(){
							  hideOverLayer();
						  }).html(dt);
					  }
				});
	}
	
	//load the pager, it is called whenever searching,sorting and pagination happens
	function loadPager(postUrl,data){
		jQuery.ajaxQueue({
			  url: postUrl,
			  dataType: 'html',
			  type:'POST',	
			  data: data,
			  error:function(xhr, status, errorThrown) {
		            alert(errorThrown+'\n'+status+'\n'+xhr.statusText);
		      },			  
			  success: function(dt) {
		    	  $('.pagination').fadeIn().html(dt);
			  }
		});
	}
	
	//create an overlayer,but don't display it
	function createOverLayer(){
		overlayer =document.createElement('div');
		$(overlayer).css({
	      position:'absolute', 
	      backgroundColor: '#000',
	      opacity: 0.5,
	      top: '0',
	      left: '0',
	      id:'overlayer',
	      zIndex:9999,
	      display:'none'
	    });
	    
	    loader = document.createElement('img');
	    $(loader).attr('src','img/loader.gif').css({
	    	position:'absolute',
	    	top: '50%',
	    	zIndex:9999
	    });
	    
	    $(overlayer).append(loader);	    
	    $('#view-table-cont').append(overlayer);
	}
	
	//display an overlayer
	function showOverLayer(){
		if($('#view-table-cont').height()!=0){
			$(overlayer).css({
				height: $('#view-table-cont').height(),
				width: $('#view-table-cont').width(),
				display: 'block'
			});
			$(loader).css({
				left: ($('#view-table-cont').width()-$(loader).width())/2,
				dislay: 'block'
			  }	
			)
		}
	}
	
	//hide the overlayer
	function hideOverLayer(){
		$(overlayer).fadeOut();
	}
	
	function escapeQuotes(string){
		return string.replace('"', "&quot;")&&string.replace("'", "&#39;");
	}

});


//preload loader gif
var i = new Image;
i.src='img/loader.gif';