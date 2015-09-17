<?php

// This doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://docs.hhvm.com/manual/en/class.infiniteiterator.php )
 *
 * The InfiniteIterator allows one to infinitely iterate over an iterator
 * without having to manually rewind the iterator upon reaching its end.
 *
 */
class InfiniteIterator extends IteratorIterator implements OuterIterator {

  private $valid;

  public function rewind() {
    $iter = $this->getInnerIterator();
    $this->_setPosition(0);
    $iter->rewind();
    $this->valid = $this->_fetch(true);
  }

  // This doc comment block generated by idl/sysdoc.php
  /**
   * ( excerpt from http://docs.hhvm.com/manual/en/infiniteiterator.next.php )
   *
   * Moves the inner Iterator forward to its next element if there is one,
   * otherwise rewinds the inner Iterator back to the beginning.
   *
   * Even an InfiniteIterator stops if its inner Iterator is empty.
   *
   * @return     mixed   No value is returned.
   */
  public function next() {
    $iter = $this->getInnerIterator();
    $this->_setPosition($this->_getPosition() + 1);
    $iter->next();
    if ($iter->valid()) {
      $this->valid = $this->_fetch(false);
    } else {
      $this->_setPosition(0);
      $iter->rewind();
      if ($iter->valid()) {
        $this->valid = $this->_fetch(false);
      }
    }
  }

  public function valid() {
    return $this->valid;
  }

}

