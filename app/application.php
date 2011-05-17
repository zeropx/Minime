<?php 

/*
  Most of this stuff will be broken up other files/classes when i am ready
  
*/



/**
 * Get url arguments, 
 * I took this from Drupal.. 
 * @param string $index 
 * @param string $path 
 * @return array
 */
function arg($index = NULL, $path = NULL) {
  static $arguments;
  
  /*
    If the query hasn't been set for q, then return false. 
  */
  if (!isset($_GET['q'])) 
  {
    return false;
  }
  
  if (!isset($path)) 
  {
    $path = $_GET['q'];
  }
  
  if (!isset($arguments[$path])) 
  {
    $arguments[$path] = explode('/', $path);
  }
  
  if (!isset($index)) 
  {
    return $arguments[$path];
  }
  
  if (isset($arguments[$path][$index])) 
  {
    return $arguments[$path][$index];
  }
  
}

/**
 * Get page based on arguments,
 * this is not complete in the slightest and needs TONS of work
 * the basic works so far. 
 *
 * @param string $arg 
 * @return void
 * @author Eric Casequin
 */
function get_page($arg = NULL)
{

  if (!isset($arg)) 
  {
    $arg = arg();
    $file = CONTENT_PATH . get_file_path($arg);
    if ( file_exists($file) )
    {
      return get_content($file);
    }
    else 
    {
      return get_content(CONTENT_PATH . "404.php");
      
    }
  }
  
}

/**
 * Get pat to the file based on arguments.
 * this is not sanitized yet and needs to be. 
 *
 * @param string $arg 
 * @return string
 * @author Eric Casequin
 */
function get_file_path($arg)
{
  // Should sanitize this
  return implode("/", $arg) . ".php";
}


/**
 * Get contents with variable passed to view. 
 * this fucntion basically gets the file as an include into
 * a buffer and then sends buffer to variable.
 *
 * @param string $file 
 * @param string $arg 
 * @return string
 * @author Eric Casequin
 */
function get_content($file = NULL, $arg = array())
{

  ob_start();
  include $file;

  $buffered_content = ob_get_contents();
  ob_end_clean();
  return $buffered_content;
}



















