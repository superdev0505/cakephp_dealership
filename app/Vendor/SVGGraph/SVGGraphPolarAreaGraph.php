<?php
/**
 * Copyright (C) 2014 Graham Breach
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/**
 * For more information, please contact <graham@goat1000.com>
 */

require_once 'SVGGraphPieGraph.php';

class PolarAreaGraph extends PieGraph {

  protected $slice_angle;
  protected $radius_factor_x;
  protected $radius_factor_y;

  /**
   * Sets up the polar graph details
   */
  protected function Calc()
  {
    // no sorting, no percentage
    $this->sort = false;
    $this->show_label_percent = false;
    parent::Calc();

    $smax = sqrt($this->GetMaxValue());
    $this->radius_factor_x = $this->radius_x / $smax;
    $this->radius_factor_y = $this->radius_y / $smax;

    $this->slice_angle = 2.0 * M_PI / ($this->GetMaxKey() + 1);
  }

  /**
   * Sets up the angles and radii for slice
   */
  protected function GetSliceInfo($num, $item, &$angle_start, &$angle_end,
    &$radius_x, &$radius_y)
  {
    $angle_start = $num * $this->slice_angle;
    $angle_end = ($num + 1) * $this->slice_angle;

    if($item->value) {
      $sval = sqrt((float)$item->value);
      $radius_x = $this->radius_factor_x * $sval;
      $radius_y = $this->radius_factor_y * $sval;
    } else {
      $radius_x = $radius_y = 0;
    }
    return true;
  }

  /**
   * Returns the x and y position of the label, relative to centre
   */
  protected function GetLabelPosition($item, $a_start, $a_end, $rx, $ry, $text)
  {
    $ab = ($a_end - $a_start) / 2;
    $ac = $this->s_angle + $a_start + $ab;
    $ts = $this->TextSize($text, $this->label_font_size, 0.65, $this->encoding,
      0, $this->label_font_size); 
    $x1 = $ts[0] / 2;
    $y1 = $ts[1] / 2;
    $t_radius = sqrt(pow($x1, 2) + pow($y1, 2));

    // see if the text fits in the slice
    $r1 = $this->label_position * $rx;
    if(sin($ab) * $r1 > $t_radius) {
      // place it at the label_position distance from centre
      $xc = $this->label_position * $rx * cos($ac);
      $yc = $this->label_position * $ry * sin($ac);
    } else {
      // find min distance that label fits in
      $h  = $t_radius / sin($ab);
      $xch = $h * cos($ac) * $this->radius_x / $this->radius_y;
      $ych = $h * sin($ac);
      $xcr = ($rx + $t_radius) * cos($ac);
      $ycr = ($ry + $t_radius) * sin($ac);
      if(pow($xcr, 2) + pow($ycr, 2) > pow($xch, 2) + pow($ych, 2)) {
        $xc = $xcr;
        $yc = $ycr;
      } else {
        $xc = $xch;
        $yc = $ych;
      }
    }
    if($this->reverse)
      $yc = -$yc;

    // try to place the centre of the label at the position
    $oy = $ts[1] / 2 - $this->label_font_size * 0.8;
    return array($xc, $yc - $oy);
  }
  
}

