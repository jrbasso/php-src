--TEST--
Test var_export() function with VarExportSerializable interface
--FILE--
<?php

class Foo implements VarExportSerializable {

	public $a = 1;
	public $b = 2;

	public function varExportSerialize() {
		return ['a'];
	}

}

class Bar implements VarExportSerializable {

	public $a = 1;
	public $b = 2;

	public function varExportSerialize() {
		return ['a', 'c'];
	}

}

class FooBar implements VarExportSerializable {

	public $a = 1;
	public $b = 2;

	public function varExportSerialize() {
		return false;
	}

}

var_export(new Foo(), false); echo "\n\n";
var_export(new Bar(), false); echo "\n\n";
var_export(new FooBar(), false);

--EXPECTF--
Foo::__set_state(array(
   'a' => 1,
))

Bar::__set_state(array(
   'a' => 1,
))


Warning: FooBar::varExportSerialize() did not return an array in %s on line %d
NULL