<?php
class Alertas
{
  private $valid_type = [];


  private $default = null;
  private $type = null;
  private $msg = null;


  function __construct()
  {
    $this->default = 'success';
    $this->valid_type = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'ligth', 'dark'];
  }

  public static function new($msg, $type = null)
  {
    $self = new self();

    if ($type === null) {

      $self->type = $self->default;
    }

    $self->type = in_array($type, $self->valid_type) ? $type : $self->default;

    if (is_array($msg)) {
      foreach ($msg as $m) {
        $_SESSION[$self->type][] = $m;
      }
      return true;
    }

    $_SESSION[$self->type][] = $msg;
    return true;
  }

  static function error(string $msg)
  {
    self::new($msg, 'danger');
    return true;
  }
  static function info(string $msg)
  {
    self::new($msg, 'info');
    return true;
  }
  static function success(string $msg)
  {
    self::new($msg, 'success');
    return true;
  }


  public static function mostraAlerta()
  {
    $self = new self();
    $placeholder = '';
    $output = '';

    foreach ($self->valid_type as $type) {
      if (isset($_SESSION[$type]) && !empty($_SESSION[$type])) {
        foreach ($_SESSION[$type] as $m) {
          $placeholder = '<div class="alert alert-%s alert-dismissible fade show" role="alert">
          %s
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
          $output .= sprintf($placeholder, $type, $m);
        }
        unset($_SESSION[$type]);
      }
    }
    return $output;
  }
}
