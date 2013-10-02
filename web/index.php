<?php
// MyShelves - Front controller

spl_autoload_register(  function ($classe) {
                            require(substr(__DIR__, 0, strrpos(__DIR__, '/')) . '/src/' .
                                    str_replace('\\', DIRECTORY_SEPARATOR, $classe) . '.class.php' );
                        });

MyShelves\FrontController::getInstance()->dispatch();

?>
