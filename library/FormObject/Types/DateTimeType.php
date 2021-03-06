<?php
/*
 * This file is part of FormObject.
 *
 * Foobar is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 * 
 * @package FormObject
 * @author André Ribeiro de Miranda <ardemiranda@gmail.com>
 * @copyright 2010 André Ribeiro de Miranda
 * 
 * @license http://www.gnu.org/copyleft/lesser.txt GNU LESSER GENERAL PUBLIC LICENSE
 * @link http://belocodigo.com.br
 */

namespace FormObject\Types;

class DateTimeType extends Type {

    public function getName() {
        return Type::DATETIME;
    }

    public function convertToViewValue($value) {
        return ($value !== null) ? $value->format(self::getFormatDefault()->getDateTimeFormatString()) : null;
    }

    public function convertToPHPValue($value) {
        if ($value === null) {
            return null;
        }
        
        $val = \DateTime::createFromFormat(self::getFormatDefault()->getDateTimeFormatString(), $value);
        if (! $val) {
            throw new \Exception('Conversão Falhou');
        }
        return $val;
    }
}