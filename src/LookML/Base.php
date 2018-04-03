<?php

namespace LookML;

/**
 * Base class for all block types. Provides property handling and final document
 * rendering.
 */
abstract class Base {

  protected $lookml = [];

  /**
   * Set a property in the current scope.
   *
   * @param string $key
   * @param mixed $value
   *
   * @return $this
   */
  function set($key, $value) {
    if (is_string($key)) {
      $this->lookml[] = new Property($key, $value);
    }
    return $this;
  }

  function add($item) {
    $this->lookml[] = $item;
    return $this;
  }

  public function __toString() {
    $out = '';
    foreach ($this->lookml as $property) {
      $out .= $property . "\n";
    }
    return $out;
  }

  public function comment($comment) {
    $this->lookml[] = new Comment($comment);
    return $this;
  }

}
