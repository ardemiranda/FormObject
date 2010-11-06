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
 * @package FormObject\Object
 * @author André Ribeiro de Miranda <ardemiranda@gmail.com>
 * @copyright 2010 André Ribeiro de Miranda
 * 
 * @license http://www.gnu.org/copyleft/lesser.txt GNU LESSER GENERAL PUBLIC LICENSE
 * @link http://belocodigo.com.br
 */

namespace FormObject\Object;

final class Find {
	
	function __construct() {
	
	}
	
	private function _find() {
		return $this->_entityManager->find($this->_class, $this->_where());
	}
	
	private function _where() {
		$identifierFieldNames = $this->_classMetadata->getIdentifierFieldNames();
		$where = array();
		foreach ($identifierFieldNames as $fieldName) {
			$where[$fieldName] = $this->_form->getElement($fieldName)->getValue();
		}
		return $where;
	}
}

?>