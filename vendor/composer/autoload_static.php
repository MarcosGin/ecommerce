<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit20c21e6cbe05927a5b30745fa33cfa9a
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '3917c79c5052b270641b5a200963dbc2' => __DIR__ . '/..' . '/kint-php/kint/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twig\\' => 5,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Sirius\\Validation\\' => 18,
        ),
        'P' => 
        array (
            'Phroute\\Phroute\\' => 16,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twig\\' => 
        array (
            0 => __DIR__ . '/..' . '/twig/twig/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Sirius\\Validation\\' => 
        array (
            0 => __DIR__ . '/..' . '/siriusphp/validation/src',
        ),
        'Phroute\\Phroute\\' => 
        array (
            0 => __DIR__ . '/..' . '/phroute/phroute/src/Phroute',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $prefixesPsr0 = array (
        'T' => 
        array (
            'Twig_' => 
            array (
                0 => __DIR__ . '/..' . '/twig/twig/lib',
            ),
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'Kint' => __DIR__ . '/..' . '/kint-php/kint/src/Kint.php',
        'Kint_Object' => __DIR__ . '/..' . '/kint-php/kint/src/Object.php',
        'Kint_Object_Blob' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Blob.php',
        'Kint_Object_Closure' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Closure.php',
        'Kint_Object_Color' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Color.php',
        'Kint_Object_DateTime' => __DIR__ . '/..' . '/kint-php/kint/src/Object/DateTime.php',
        'Kint_Object_Instance' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Instance.php',
        'Kint_Object_Method' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Method.php',
        'Kint_Object_Nothing' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Nothing.php',
        'Kint_Object_Parameter' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Parameter.php',
        'Kint_Object_Representation' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation.php',
        'Kint_Object_Representation_Color' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation/Color.php',
        'Kint_Object_Representation_Docstring' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation/Docstring.php',
        'Kint_Object_Representation_Microtime' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation/Microtime.php',
        'Kint_Object_Representation_Source' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation/Source.php',
        'Kint_Object_Representation_SplFileInfo' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Representation/SplFileInfo.php',
        'Kint_Object_Resource' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Resource.php',
        'Kint_Object_Stream' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Stream.php',
        'Kint_Object_Throwable' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Throwable.php',
        'Kint_Object_Trace' => __DIR__ . '/..' . '/kint-php/kint/src/Object/Trace.php',
        'Kint_Object_TraceFrame' => __DIR__ . '/..' . '/kint-php/kint/src/Object/TraceFrame.php',
        'Kint_Parser' => __DIR__ . '/..' . '/kint-php/kint/src/Parser.php',
        'Kint_Parser_Base64' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Base64.php',
        'Kint_Parser_Binary' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Binary.php',
        'Kint_Parser_Blacklist' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Blacklist.php',
        'Kint_Parser_ClassMethods' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/ClassMethods.php',
        'Kint_Parser_ClassStatics' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/ClassStatics.php',
        'Kint_Parser_Closure' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Closure.php',
        'Kint_Parser_Color' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Color.php',
        'Kint_Parser_DOMIterator' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/DOMIterator.php',
        'Kint_Parser_DOMNode' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/DOMNode.php',
        'Kint_Parser_DateTime' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/DateTime.php',
        'Kint_Parser_FsPath' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/FsPath.php',
        'Kint_Parser_Iterator' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Iterator.php',
        'Kint_Parser_Json' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Json.php',
        'Kint_Parser_Microtime' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Microtime.php',
        'Kint_Parser_Plugin' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Plugin.php',
        'Kint_Parser_Serialize' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Serialize.php',
        'Kint_Parser_SimpleXMLElement' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/SimpleXMLElement.php',
        'Kint_Parser_SplFileInfo' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/SplFileInfo.php',
        'Kint_Parser_SplObjectStorage' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/SplObjectStorage.php',
        'Kint_Parser_Stream' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Stream.php',
        'Kint_Parser_Table' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Table.php',
        'Kint_Parser_Throwable' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Throwable.php',
        'Kint_Parser_Timestamp' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Timestamp.php',
        'Kint_Parser_ToString' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/ToString.php',
        'Kint_Parser_Trace' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Trace.php',
        'Kint_Parser_Xml' => __DIR__ . '/..' . '/kint-php/kint/src/Parser/Xml.php',
        'Kint_Renderer' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer.php',
        'Kint_Renderer_Cli' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Cli.php',
        'Kint_Renderer_Plain' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Plain.php',
        'Kint_Renderer_Rich' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich.php',
        'Kint_Renderer_Rich_Binary' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Binary.php',
        'Kint_Renderer_Rich_Blacklist' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Blacklist.php',
        'Kint_Renderer_Rich_Callable' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Callable.php',
        'Kint_Renderer_Rich_Closure' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Closure.php',
        'Kint_Renderer_Rich_Color' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Color.php',
        'Kint_Renderer_Rich_ColorDetails' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/ColorDetails.php',
        'Kint_Renderer_Rich_DepthLimit' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/DepthLimit.php',
        'Kint_Renderer_Rich_Docstring' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Docstring.php',
        'Kint_Renderer_Rich_Microtime' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Microtime.php',
        'Kint_Renderer_Rich_Nothing' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Nothing.php',
        'Kint_Renderer_Rich_Plugin' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Plugin.php',
        'Kint_Renderer_Rich_Recursion' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Recursion.php',
        'Kint_Renderer_Rich_SimpleXMLElement' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/SimpleXMLElement.php',
        'Kint_Renderer_Rich_Source' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Source.php',
        'Kint_Renderer_Rich_Table' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Table.php',
        'Kint_Renderer_Rich_Timestamp' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/Timestamp.php',
        'Kint_Renderer_Rich_TraceFrame' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Rich/TraceFrame.php',
        'Kint_Renderer_Text' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text.php',
        'Kint_Renderer_Text_Blacklist' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/Blacklist.php',
        'Kint_Renderer_Text_DepthLimit' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/DepthLimit.php',
        'Kint_Renderer_Text_Nothing' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/Nothing.php',
        'Kint_Renderer_Text_Plugin' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/Plugin.php',
        'Kint_Renderer_Text_Recursion' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/Recursion.php',
        'Kint_Renderer_Text_Trace' => __DIR__ . '/..' . '/kint-php/kint/src/Renderer/Text/Trace.php',
        'Kint_SourceParser' => __DIR__ . '/..' . '/kint-php/kint/src/SourceParser.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit20c21e6cbe05927a5b30745fa33cfa9a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit20c21e6cbe05927a5b30745fa33cfa9a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit20c21e6cbe05927a5b30745fa33cfa9a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit20c21e6cbe05927a5b30745fa33cfa9a::$classMap;

        }, null, ClassLoader::class);
    }
}
