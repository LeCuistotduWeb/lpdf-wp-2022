<?php

class lpdfTransient
{
  private $key;
  private $value;
  private $duration;

  /**
   * lpdf_transient constructor.
   * @param $transient_key string key of transient
   * @param null $duration integer duration of transient (in seconds),  1 day if not specified
   * Transforms the $transient_key value by adding prefix "lpdf_" and sets duration of transient
   */
  public function __construct($transientKey, $duration = null)
  {
    $this->setKey($transientKey);
    $this->value = null;
    if (!$duration) {
      $this->duration = 1 * DAY_IN_SECONDS;
    }
  }

  public function getKey()
  {
    return $this->key;
  }

  /**
   * @param $key String key of transient
   * Prefix the transient key with "lpdf_"
   */
  public function setKey($key)
  {
    $this->key = 'lpdf_' . $key;
  }

  public function getValue()
  {
    if ($this->value == null) {
      $this->value = get_transient($this->key);
    }

    return $this->value;
  }

  /**
   * @return bool true if transient is stored, else false
   */
  public function isCached(): bool
  {
    return $this->getValue();
  }

  /**
   * @param $content string|array|int|bool|object Any value to put into transient
   */
  public function setTransient($content)
  {
    set_transient($this->key, $content, $this->duration);
    $this->value = $content;
  }

  /**
   * Remove transient by name ( uncache )
   */
  public static function removeTransient($transientName){
    delete_transient($transientName);
  }

  /**
   * Start recording HTML output to be stored into a transient
   */
  public function startBufferTransient()
  {
    ob_start();
  }

  /**
   * Stops the record of output and store it into a transient
   */
  public function endBufferTransient()
  {
    $content = ob_get_contents();
    ob_end_clean();
    $this->setTransient($content);
  }

  /**
   * Load file as transient
   * @param $filename
   * @param $transientKey
   *
   * @return void
   */
  public static function loadFileAsTransient($filename, $transientKey)
  {
    $t = new lpdf_transient($transientKey);
    if (!$t->isCached()) {
      $t->startBufferTransient();
      include $filename;
      $t->endBufferTransient();
    }
    echo $t->getValue();
  }
}