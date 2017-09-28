<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Bin\\Database\\DB' => $baseDir . '/app/bin/database/DB.php',
    'App\\Bin\\GeoLocation' => $baseDir . '/app/bin/GeoLocation.php',
    'App\\Bin\\Mail\\Mail' => $baseDir . '/app/bin/mail/Mail.php',
    'App\\Bin\\Token' => $baseDir . '/app/bin/Token.php',
    'App\\Controllers\\AuthController' => $baseDir . '/app/controllers/AuthController.php',
    'App\\Controllers\\CartController' => $baseDir . '/app/controllers/CartController.php',
    'App\\Controllers\\IndexController' => $baseDir . '/app/controllers/indexController.php',
    'App\\Controllers\\ProductController' => $baseDir . '/app/controllers/ProductController.php',
    'App\\Controllers\\AccountController' => $baseDir . '/app/controllers/AccountController.php',
    'App\\Controllers\\UserController' => $baseDir . '/app/controllers/UserController.php',
    'App\\Models\\Category' => $baseDir . '/app/models/Category.php',
    'App\\Models\\Mark' => $baseDir . '/app/models/Mark.php',
    'App\\Models\\Product' => $baseDir . '/app/models/Product.php',
    'App\\Models\\User' => $baseDir . '/app/models/User.php',
    'Dotenv\\Dotenv' => $vendorDir . '/vlucas/phpdotenv/src/Dotenv.php',
    'Dotenv\\Exception\\ExceptionInterface' => $vendorDir . '/vlucas/phpdotenv/src/Exception/ExceptionInterface.php',
    'Dotenv\\Exception\\InvalidCallbackException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidCallbackException.php',
    'Dotenv\\Exception\\InvalidFileException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidFileException.php',
    'Dotenv\\Exception\\InvalidPathException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/InvalidPathException.php',
    'Dotenv\\Exception\\ValidationException' => $vendorDir . '/vlucas/phpdotenv/src/Exception/ValidationException.php',
    'Dotenv\\Loader' => $vendorDir . '/vlucas/phpdotenv/src/Loader.php',
    'Dotenv\\Validator' => $vendorDir . '/vlucas/phpdotenv/src/Validator.php',
    'EasyPeasyICS' => $vendorDir . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
    'FastRoute\\BadRouteException' => $vendorDir . '/nikic/fast-route/src/BadRouteException.php',
    'FastRoute\\DataGenerator' => $vendorDir . '/nikic/fast-route/src/DataGenerator.php',
    'FastRoute\\DataGenerator\\CharCountBased' => $vendorDir . '/nikic/fast-route/src/DataGenerator/CharCountBased.php',
    'FastRoute\\DataGenerator\\GroupCountBased' => $vendorDir . '/nikic/fast-route/src/DataGenerator/GroupCountBased.php',
    'FastRoute\\DataGenerator\\GroupPosBased' => $vendorDir . '/nikic/fast-route/src/DataGenerator/GroupPosBased.php',
    'FastRoute\\DataGenerator\\MarkBased' => $vendorDir . '/nikic/fast-route/src/DataGenerator/MarkBased.php',
    'FastRoute\\DataGenerator\\RegexBasedAbstract' => $vendorDir . '/nikic/fast-route/src/DataGenerator/RegexBasedAbstract.php',
    'FastRoute\\Dispatcher' => $vendorDir . '/nikic/fast-route/src/Dispatcher.php',
    'FastRoute\\Dispatcher\\CharCountBased' => $vendorDir . '/nikic/fast-route/src/Dispatcher/CharCountBased.php',
    'FastRoute\\Dispatcher\\GroupCountBased' => $vendorDir . '/nikic/fast-route/src/Dispatcher/GroupCountBased.php',
    'FastRoute\\Dispatcher\\GroupPosBased' => $vendorDir . '/nikic/fast-route/src/Dispatcher/GroupPosBased.php',
    'FastRoute\\Dispatcher\\MarkBased' => $vendorDir . '/nikic/fast-route/src/Dispatcher/MarkBased.php',
    'FastRoute\\Dispatcher\\RegexBasedAbstract' => $vendorDir . '/nikic/fast-route/src/Dispatcher/RegexBasedAbstract.php',
    'FastRoute\\Route' => $vendorDir . '/nikic/fast-route/src/Route.php',
    'FastRoute\\RouteCollector' => $vendorDir . '/nikic/fast-route/src/RouteCollector.php',
    'FastRoute\\RouteParser' => $vendorDir . '/nikic/fast-route/src/RouteParser.php',
    'FastRoute\\RouteParser\\Std' => $vendorDir . '/nikic/fast-route/src/RouteParser/Std.php',
    'Firebase\\JWT\\BeforeValidException' => $vendorDir . '/firebase/php-jwt/src/BeforeValidException.php',
    'Firebase\\JWT\\ExpiredException' => $vendorDir . '/firebase/php-jwt/src/ExpiredException.php',
    'Firebase\\JWT\\JWT' => $vendorDir . '/firebase/php-jwt/src/JWT.php',
    'Firebase\\JWT\\SignatureInvalidException' => $vendorDir . '/firebase/php-jwt/src/SignatureInvalidException.php',
    'Interop\\Container\\ContainerInterface' => $vendorDir . '/container-interop/container-interop/src/Interop/Container/ContainerInterface.php',
    'Interop\\Container\\Exception\\ContainerException' => $vendorDir . '/container-interop/container-interop/src/Interop/Container/Exception/ContainerException.php',
    'Interop\\Container\\Exception\\NotFoundException' => $vendorDir . '/container-interop/container-interop/src/Interop/Container/Exception/NotFoundException.php',
    'Kint' => $vendorDir . '/kint-php/kint/src/Kint.php',
    'Kint_Object' => $vendorDir . '/kint-php/kint/src/Object.php',
    'Kint_Object_Blob' => $vendorDir . '/kint-php/kint/src/Object/Blob.php',
    'Kint_Object_Closure' => $vendorDir . '/kint-php/kint/src/Object/Closure.php',
    'Kint_Object_Color' => $vendorDir . '/kint-php/kint/src/Object/Color.php',
    'Kint_Object_DateTime' => $vendorDir . '/kint-php/kint/src/Object/DateTime.php',
    'Kint_Object_Instance' => $vendorDir . '/kint-php/kint/src/Object/Instance.php',
    'Kint_Object_Method' => $vendorDir . '/kint-php/kint/src/Object/Method.php',
    'Kint_Object_Nothing' => $vendorDir . '/kint-php/kint/src/Object/Nothing.php',
    'Kint_Object_Parameter' => $vendorDir . '/kint-php/kint/src/Object/Parameter.php',
    'Kint_Object_Representation' => $vendorDir . '/kint-php/kint/src/Object/Representation.php',
    'Kint_Object_Representation_Color' => $vendorDir . '/kint-php/kint/src/Object/Representation/Color.php',
    'Kint_Object_Representation_Docstring' => $vendorDir . '/kint-php/kint/src/Object/Representation/Docstring.php',
    'Kint_Object_Representation_Microtime' => $vendorDir . '/kint-php/kint/src/Object/Representation/Microtime.php',
    'Kint_Object_Representation_Source' => $vendorDir . '/kint-php/kint/src/Object/Representation/Source.php',
    'Kint_Object_Representation_SplFileInfo' => $vendorDir . '/kint-php/kint/src/Object/Representation/SplFileInfo.php',
    'Kint_Object_Resource' => $vendorDir . '/kint-php/kint/src/Object/Resource.php',
    'Kint_Object_Stream' => $vendorDir . '/kint-php/kint/src/Object/Stream.php',
    'Kint_Object_Throwable' => $vendorDir . '/kint-php/kint/src/Object/Throwable.php',
    'Kint_Object_Trace' => $vendorDir . '/kint-php/kint/src/Object/Trace.php',
    'Kint_Object_TraceFrame' => $vendorDir . '/kint-php/kint/src/Object/TraceFrame.php',
    'Kint_Parser' => $vendorDir . '/kint-php/kint/src/Parser.php',
    'Kint_Parser_Base64' => $vendorDir . '/kint-php/kint/src/Parser/Base64.php',
    'Kint_Parser_Binary' => $vendorDir . '/kint-php/kint/src/Parser/Binary.php',
    'Kint_Parser_Blacklist' => $vendorDir . '/kint-php/kint/src/Parser/Blacklist.php',
    'Kint_Parser_ClassMethods' => $vendorDir . '/kint-php/kint/src/Parser/ClassMethods.php',
    'Kint_Parser_ClassStatics' => $vendorDir . '/kint-php/kint/src/Parser/ClassStatics.php',
    'Kint_Parser_Closure' => $vendorDir . '/kint-php/kint/src/Parser/Closure.php',
    'Kint_Parser_Color' => $vendorDir . '/kint-php/kint/src/Parser/Color.php',
    'Kint_Parser_DOMIterator' => $vendorDir . '/kint-php/kint/src/Parser/DOMIterator.php',
    'Kint_Parser_DOMNode' => $vendorDir . '/kint-php/kint/src/Parser/DOMNode.php',
    'Kint_Parser_DateTime' => $vendorDir . '/kint-php/kint/src/Parser/DateTime.php',
    'Kint_Parser_FsPath' => $vendorDir . '/kint-php/kint/src/Parser/FsPath.php',
    'Kint_Parser_Iterator' => $vendorDir . '/kint-php/kint/src/Parser/Iterator.php',
    'Kint_Parser_Json' => $vendorDir . '/kint-php/kint/src/Parser/Json.php',
    'Kint_Parser_Microtime' => $vendorDir . '/kint-php/kint/src/Parser/Microtime.php',
    'Kint_Parser_Plugin' => $vendorDir . '/kint-php/kint/src/Parser/Plugin.php',
    'Kint_Parser_Serialize' => $vendorDir . '/kint-php/kint/src/Parser/Serialize.php',
    'Kint_Parser_SimpleXMLElement' => $vendorDir . '/kint-php/kint/src/Parser/SimpleXMLElement.php',
    'Kint_Parser_SplFileInfo' => $vendorDir . '/kint-php/kint/src/Parser/SplFileInfo.php',
    'Kint_Parser_SplObjectStorage' => $vendorDir . '/kint-php/kint/src/Parser/SplObjectStorage.php',
    'Kint_Parser_Stream' => $vendorDir . '/kint-php/kint/src/Parser/Stream.php',
    'Kint_Parser_Table' => $vendorDir . '/kint-php/kint/src/Parser/Table.php',
    'Kint_Parser_Throwable' => $vendorDir . '/kint-php/kint/src/Parser/Throwable.php',
    'Kint_Parser_Timestamp' => $vendorDir . '/kint-php/kint/src/Parser/Timestamp.php',
    'Kint_Parser_ToString' => $vendorDir . '/kint-php/kint/src/Parser/ToString.php',
    'Kint_Parser_Trace' => $vendorDir . '/kint-php/kint/src/Parser/Trace.php',
    'Kint_Parser_Xml' => $vendorDir . '/kint-php/kint/src/Parser/Xml.php',
    'Kint_Renderer' => $vendorDir . '/kint-php/kint/src/Renderer.php',
    'Kint_Renderer_Cli' => $vendorDir . '/kint-php/kint/src/Renderer/Cli.php',
    'Kint_Renderer_Plain' => $vendorDir . '/kint-php/kint/src/Renderer/Plain.php',
    'Kint_Renderer_Rich' => $vendorDir . '/kint-php/kint/src/Renderer/Rich.php',
    'Kint_Renderer_Rich_Binary' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Binary.php',
    'Kint_Renderer_Rich_Blacklist' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Blacklist.php',
    'Kint_Renderer_Rich_Callable' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Callable.php',
    'Kint_Renderer_Rich_Closure' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Closure.php',
    'Kint_Renderer_Rich_Color' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Color.php',
    'Kint_Renderer_Rich_ColorDetails' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/ColorDetails.php',
    'Kint_Renderer_Rich_DepthLimit' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/DepthLimit.php',
    'Kint_Renderer_Rich_Docstring' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Docstring.php',
    'Kint_Renderer_Rich_Microtime' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Microtime.php',
    'Kint_Renderer_Rich_Nothing' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Nothing.php',
    'Kint_Renderer_Rich_Plugin' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Plugin.php',
    'Kint_Renderer_Rich_Recursion' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Recursion.php',
    'Kint_Renderer_Rich_SimpleXMLElement' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/SimpleXMLElement.php',
    'Kint_Renderer_Rich_Source' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Source.php',
    'Kint_Renderer_Rich_Table' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Table.php',
    'Kint_Renderer_Rich_Timestamp' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/Timestamp.php',
    'Kint_Renderer_Rich_TraceFrame' => $vendorDir . '/kint-php/kint/src/Renderer/Rich/TraceFrame.php',
    'Kint_Renderer_Text' => $vendorDir . '/kint-php/kint/src/Renderer/Text.php',
    'Kint_Renderer_Text_Blacklist' => $vendorDir . '/kint-php/kint/src/Renderer/Text/Blacklist.php',
    'Kint_Renderer_Text_DepthLimit' => $vendorDir . '/kint-php/kint/src/Renderer/Text/DepthLimit.php',
    'Kint_Renderer_Text_Nothing' => $vendorDir . '/kint-php/kint/src/Renderer/Text/Nothing.php',
    'Kint_Renderer_Text_Plugin' => $vendorDir . '/kint-php/kint/src/Renderer/Text/Plugin.php',
    'Kint_Renderer_Text_Recursion' => $vendorDir . '/kint-php/kint/src/Renderer/Text/Recursion.php',
    'Kint_Renderer_Text_Trace' => $vendorDir . '/kint-php/kint/src/Renderer/Text/Trace.php',
    'Kint_SourceParser' => $vendorDir . '/kint-php/kint/src/SourceParser.php',
    'PHPMailer' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
    'PHPMailerOAuth' => $vendorDir . '/phpmailer/phpmailer/class.phpmaileroauth.php',
    'PHPMailerOAuthGoogle' => $vendorDir . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
    'POP3' => $vendorDir . '/phpmailer/phpmailer/class.pop3.php',
    'Pimple\\Container' => $vendorDir . '/pimple/pimple/src/Pimple/Container.php',
    'Pimple\\Exception\\ExpectedInvokableException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/ExpectedInvokableException.php',
    'Pimple\\Exception\\FrozenServiceException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/FrozenServiceException.php',
    'Pimple\\Exception\\InvalidServiceIdentifierException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/InvalidServiceIdentifierException.php',
    'Pimple\\Exception\\UnknownIdentifierException' => $vendorDir . '/pimple/pimple/src/Pimple/Exception/UnknownIdentifierException.php',
    'Pimple\\Psr11\\Container' => $vendorDir . '/pimple/pimple/src/Pimple/Psr11/Container.php',
    'Pimple\\Psr11\\ServiceLocator' => $vendorDir . '/pimple/pimple/src/Pimple/Psr11/ServiceLocator.php',
    'Pimple\\ServiceIterator' => $vendorDir . '/pimple/pimple/src/Pimple/ServiceIterator.php',
    'Pimple\\ServiceProviderInterface' => $vendorDir . '/pimple/pimple/src/Pimple/ServiceProviderInterface.php',
    'Pimple\\Tests\\Fixtures\\Invokable' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Fixtures/Invokable.php',
    'Pimple\\Tests\\Fixtures\\NonInvokable' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Fixtures/NonInvokable.php',
    'Pimple\\Tests\\Fixtures\\PimpleServiceProvider' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Fixtures/PimpleServiceProvider.php',
    'Pimple\\Tests\\Fixtures\\Service' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Fixtures/Service.php',
    'Pimple\\Tests\\PimpleServiceProviderInterfaceTest' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/PimpleServiceProviderInterfaceTest.php',
    'Pimple\\Tests\\PimpleTest' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/PimpleTest.php',
    'Pimple\\Tests\\Psr11\\ContainerTest' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Psr11/ContainerTest.php',
    'Pimple\\Tests\\Psr11\\ServiceLocatorTest' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/Psr11/ServiceLocatorTest.php',
    'Pimple\\Tests\\ServiceIteratorTest' => $vendorDir . '/pimple/pimple/src/Pimple/Tests/ServiceIteratorTest.php',
    'Psr\\Container\\ContainerExceptionInterface' => $vendorDir . '/psr/container/src/ContainerExceptionInterface.php',
    'Psr\\Container\\ContainerInterface' => $vendorDir . '/psr/container/src/ContainerInterface.php',
    'Psr\\Container\\NotFoundExceptionInterface' => $vendorDir . '/psr/container/src/NotFoundExceptionInterface.php',
    'Psr\\Http\\Message\\MessageInterface' => $vendorDir . '/psr/http-message/src/MessageInterface.php',
    'Psr\\Http\\Message\\RequestInterface' => $vendorDir . '/psr/http-message/src/RequestInterface.php',
    'Psr\\Http\\Message\\ResponseInterface' => $vendorDir . '/psr/http-message/src/ResponseInterface.php',
    'Psr\\Http\\Message\\ServerRequestInterface' => $vendorDir . '/psr/http-message/src/ServerRequestInterface.php',
    'Psr\\Http\\Message\\StreamInterface' => $vendorDir . '/psr/http-message/src/StreamInterface.php',
    'Psr\\Http\\Message\\UploadedFileInterface' => $vendorDir . '/psr/http-message/src/UploadedFileInterface.php',
    'Psr\\Http\\Message\\UriInterface' => $vendorDir . '/psr/http-message/src/UriInterface.php',
    'SMTP' => $vendorDir . '/phpmailer/phpmailer/class.smtp.php',
    'Sirius\\Validation\\DataWrapper\\ArrayWrapper' => $vendorDir . '/siriusphp/validation/src/DataWrapper/ArrayWrapper.php',
    'Sirius\\Validation\\DataWrapper\\WrapperInterface' => $vendorDir . '/siriusphp/validation/src/DataWrapper/WrapperInterface.php',
    'Sirius\\Validation\\ErrorMessage' => $vendorDir . '/siriusphp/validation/src/ErrorMessage.php',
    'Sirius\\Validation\\Helper' => $vendorDir . '/siriusphp/validation/src/Helper.php',
    'Sirius\\Validation\\RuleCollection' => $vendorDir . '/siriusphp/validation/src/RuleCollection.php',
    'Sirius\\Validation\\RuleFactory' => $vendorDir . '/siriusphp/validation/src/RuleFactory.php',
    'Sirius\\Validation\\Rule\\AbstractRule' => $vendorDir . '/siriusphp/validation/src/Rule/AbstractRule.php',
    'Sirius\\Validation\\Rule\\AbstractStringRule' => $vendorDir . '/siriusphp/validation/src/Rule/AbstractStringRule.php',
    'Sirius\\Validation\\Rule\\Alpha' => $vendorDir . '/siriusphp/validation/src/Rule/Alpha.php',
    'Sirius\\Validation\\Rule\\AlphaNumHyphen' => $vendorDir . '/siriusphp/validation/src/Rule/AlphaNumHyphen.php',
    'Sirius\\Validation\\Rule\\AlphaNumeric' => $vendorDir . '/siriusphp/validation/src/Rule/AlphaNumeric.php',
    'Sirius\\Validation\\Rule\\ArrayLength' => $vendorDir . '/siriusphp/validation/src/Rule/ArrayLength.php',
    'Sirius\\Validation\\Rule\\ArrayMaxLength' => $vendorDir . '/siriusphp/validation/src/Rule/ArrayMaxLength.php',
    'Sirius\\Validation\\Rule\\ArrayMinLength' => $vendorDir . '/siriusphp/validation/src/Rule/ArrayMinLength.php',
    'Sirius\\Validation\\Rule\\Between' => $vendorDir . '/siriusphp/validation/src/Rule/Between.php',
    'Sirius\\Validation\\Rule\\Callback' => $vendorDir . '/siriusphp/validation/src/Rule/Callback.php',
    'Sirius\\Validation\\Rule\\Date' => $vendorDir . '/siriusphp/validation/src/Rule/Date.php',
    'Sirius\\Validation\\Rule\\DateTime' => $vendorDir . '/siriusphp/validation/src/Rule/DateTime.php',
    'Sirius\\Validation\\Rule\\Email' => $vendorDir . '/siriusphp/validation/src/Rule/Email.php',
    'Sirius\\Validation\\Rule\\EmailDomain' => $vendorDir . '/siriusphp/validation/src/Rule/EmailDomain.php',
    'Sirius\\Validation\\Rule\\Equal' => $vendorDir . '/siriusphp/validation/src/Rule/Equal.php',
    'Sirius\\Validation\\Rule\\File\\Extension' => $vendorDir . '/siriusphp/validation/src/Rule/File/Extension.php',
    'Sirius\\Validation\\Rule\\File\\Image' => $vendorDir . '/siriusphp/validation/src/Rule/File/Image.php',
    'Sirius\\Validation\\Rule\\File\\ImageHeight' => $vendorDir . '/siriusphp/validation/src/Rule/File/ImageHeight.php',
    'Sirius\\Validation\\Rule\\File\\ImageRatio' => $vendorDir . '/siriusphp/validation/src/Rule/File/ImageRatio.php',
    'Sirius\\Validation\\Rule\\File\\ImageWidth' => $vendorDir . '/siriusphp/validation/src/Rule/File/ImageWidth.php',
    'Sirius\\Validation\\Rule\\File\\Size' => $vendorDir . '/siriusphp/validation/src/Rule/File/Size.php',
    'Sirius\\Validation\\Rule\\FullName' => $vendorDir . '/siriusphp/validation/src/Rule/FullName.php',
    'Sirius\\Validation\\Rule\\GreaterThan' => $vendorDir . '/siriusphp/validation/src/Rule/GreaterThan.php',
    'Sirius\\Validation\\Rule\\InList' => $vendorDir . '/siriusphp/validation/src/Rule/InList.php',
    'Sirius\\Validation\\Rule\\Integer' => $vendorDir . '/siriusphp/validation/src/Rule/Integer.php',
    'Sirius\\Validation\\Rule\\IpAddress' => $vendorDir . '/siriusphp/validation/src/Rule/IpAddress.php',
    'Sirius\\Validation\\Rule\\Length' => $vendorDir . '/siriusphp/validation/src/Rule/Length.php',
    'Sirius\\Validation\\Rule\\LessThan' => $vendorDir . '/siriusphp/validation/src/Rule/LessThan.php',
    'Sirius\\Validation\\Rule\\Match' => $vendorDir . '/siriusphp/validation/src/Rule/Match.php',
    'Sirius\\Validation\\Rule\\MaxLength' => $vendorDir . '/siriusphp/validation/src/Rule/MaxLength.php',
    'Sirius\\Validation\\Rule\\MinLength' => $vendorDir . '/siriusphp/validation/src/Rule/MinLength.php',
    'Sirius\\Validation\\Rule\\NotInList' => $vendorDir . '/siriusphp/validation/src/Rule/NotInList.php',
    'Sirius\\Validation\\Rule\\NotRegex' => $vendorDir . '/siriusphp/validation/src/Rule/NotRegex.php',
    'Sirius\\Validation\\Rule\\Number' => $vendorDir . '/siriusphp/validation/src/Rule/Number.php',
    'Sirius\\Validation\\Rule\\Regex' => $vendorDir . '/siriusphp/validation/src/Rule/Regex.php',
    'Sirius\\Validation\\Rule\\Required' => $vendorDir . '/siriusphp/validation/src/Rule/Required.php',
    'Sirius\\Validation\\Rule\\RequiredWhen' => $vendorDir . '/siriusphp/validation/src/Rule/RequiredWhen.php',
    'Sirius\\Validation\\Rule\\RequiredWith' => $vendorDir . '/siriusphp/validation/src/Rule/RequiredWith.php',
    'Sirius\\Validation\\Rule\\RequiredWithout' => $vendorDir . '/siriusphp/validation/src/Rule/RequiredWithout.php',
    'Sirius\\Validation\\Rule\\Time' => $vendorDir . '/siriusphp/validation/src/Rule/Time.php',
    'Sirius\\Validation\\Rule\\Upload\\Extension' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/Extension.php',
    'Sirius\\Validation\\Rule\\Upload\\Image' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/Image.php',
    'Sirius\\Validation\\Rule\\Upload\\ImageHeight' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/ImageHeight.php',
    'Sirius\\Validation\\Rule\\Upload\\ImageRatio' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/ImageRatio.php',
    'Sirius\\Validation\\Rule\\Upload\\ImageWidth' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/ImageWidth.php',
    'Sirius\\Validation\\Rule\\Upload\\Required' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/Required.php',
    'Sirius\\Validation\\Rule\\Upload\\Size' => $vendorDir . '/siriusphp/validation/src/Rule/Upload/Size.php',
    'Sirius\\Validation\\Rule\\Url' => $vendorDir . '/siriusphp/validation/src/Rule/Url.php',
    'Sirius\\Validation\\Rule\\Website' => $vendorDir . '/siriusphp/validation/src/Rule/Website.php',
    'Sirius\\Validation\\Util\\Arr' => $vendorDir . '/siriusphp/validation/src/Util/Arr.php',
    'Sirius\\Validation\\Validator' => $vendorDir . '/siriusphp/validation/src/Validator.php',
    'Sirius\\Validation\\ValidatorInterface' => $vendorDir . '/siriusphp/validation/src/ValidatorInterface.php',
    'Sirius\\Validation\\ValueValidator' => $vendorDir . '/siriusphp/validation/src/ValueValidator.php',
    'Slim\\App' => $vendorDir . '/slim/slim/Slim/App.php',
    'Slim\\CallableResolver' => $vendorDir . '/slim/slim/Slim/CallableResolver.php',
    'Slim\\CallableResolverAwareTrait' => $vendorDir . '/slim/slim/Slim/CallableResolverAwareTrait.php',
    'Slim\\Collection' => $vendorDir . '/slim/slim/Slim/Collection.php',
    'Slim\\Container' => $vendorDir . '/slim/slim/Slim/Container.php',
    'Slim\\DefaultServicesProvider' => $vendorDir . '/slim/slim/Slim/DefaultServicesProvider.php',
    'Slim\\DeferredCallable' => $vendorDir . '/slim/slim/Slim/DeferredCallable.php',
    'Slim\\Exception\\ContainerException' => $vendorDir . '/slim/slim/Slim/Exception/ContainerException.php',
    'Slim\\Exception\\ContainerValueNotFoundException' => $vendorDir . '/slim/slim/Slim/Exception/ContainerValueNotFoundException.php',
    'Slim\\Exception\\InvalidMethodException' => $vendorDir . '/slim/slim/Slim/Exception/InvalidMethodException.php',
    'Slim\\Exception\\MethodNotAllowedException' => $vendorDir . '/slim/slim/Slim/Exception/MethodNotAllowedException.php',
    'Slim\\Exception\\NotFoundException' => $vendorDir . '/slim/slim/Slim/Exception/NotFoundException.php',
    'Slim\\Exception\\SlimException' => $vendorDir . '/slim/slim/Slim/Exception/SlimException.php',
    'Slim\\Handlers\\AbstractError' => $vendorDir . '/slim/slim/Slim/Handlers/AbstractError.php',
    'Slim\\Handlers\\AbstractHandler' => $vendorDir . '/slim/slim/Slim/Handlers/AbstractHandler.php',
    'Slim\\Handlers\\Error' => $vendorDir . '/slim/slim/Slim/Handlers/Error.php',
    'Slim\\Handlers\\NotAllowed' => $vendorDir . '/slim/slim/Slim/Handlers/NotAllowed.php',
    'Slim\\Handlers\\NotFound' => $vendorDir . '/slim/slim/Slim/Handlers/NotFound.php',
    'Slim\\Handlers\\PhpError' => $vendorDir . '/slim/slim/Slim/Handlers/PhpError.php',
    'Slim\\Handlers\\Strategies\\RequestResponse' => $vendorDir . '/slim/slim/Slim/Handlers/Strategies/RequestResponse.php',
    'Slim\\Handlers\\Strategies\\RequestResponseArgs' => $vendorDir . '/slim/slim/Slim/Handlers/Strategies/RequestResponseArgs.php',
    'Slim\\Http\\Body' => $vendorDir . '/slim/slim/Slim/Http/Body.php',
    'Slim\\Http\\Cookies' => $vendorDir . '/slim/slim/Slim/Http/Cookies.php',
    'Slim\\Http\\Environment' => $vendorDir . '/slim/slim/Slim/Http/Environment.php',
    'Slim\\Http\\Headers' => $vendorDir . '/slim/slim/Slim/Http/Headers.php',
    'Slim\\Http\\Message' => $vendorDir . '/slim/slim/Slim/Http/Message.php',
    'Slim\\Http\\Request' => $vendorDir . '/slim/slim/Slim/Http/Request.php',
    'Slim\\Http\\RequestBody' => $vendorDir . '/slim/slim/Slim/Http/RequestBody.php',
    'Slim\\Http\\Response' => $vendorDir . '/slim/slim/Slim/Http/Response.php',
    'Slim\\Http\\Stream' => $vendorDir . '/slim/slim/Slim/Http/Stream.php',
    'Slim\\Http\\UploadedFile' => $vendorDir . '/slim/slim/Slim/Http/UploadedFile.php',
    'Slim\\Http\\Uri' => $vendorDir . '/slim/slim/Slim/Http/Uri.php',
    'Slim\\Interfaces\\CallableResolverInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/CallableResolverInterface.php',
    'Slim\\Interfaces\\CollectionInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/CollectionInterface.php',
    'Slim\\Interfaces\\Http\\CookiesInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/Http/CookiesInterface.php',
    'Slim\\Interfaces\\Http\\EnvironmentInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/Http/EnvironmentInterface.php',
    'Slim\\Interfaces\\Http\\HeadersInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/Http/HeadersInterface.php',
    'Slim\\Interfaces\\InvocationStrategyInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/InvocationStrategyInterface.php',
    'Slim\\Interfaces\\RouteGroupInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/RouteGroupInterface.php',
    'Slim\\Interfaces\\RouteInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/RouteInterface.php',
    'Slim\\Interfaces\\RouterInterface' => $vendorDir . '/slim/slim/Slim/Interfaces/RouterInterface.php',
    'Slim\\MiddlewareAwareTrait' => $vendorDir . '/slim/slim/Slim/MiddlewareAwareTrait.php',
    'Slim\\Routable' => $vendorDir . '/slim/slim/Slim/Routable.php',
    'Slim\\Route' => $vendorDir . '/slim/slim/Slim/Route.php',
    'Slim\\RouteGroup' => $vendorDir . '/slim/slim/Slim/RouteGroup.php',
    'Slim\\Router' => $vendorDir . '/slim/slim/Slim/Router.php',
    'Symfony\\Polyfill\\Mbstring\\Mbstring' => $vendorDir . '/symfony/polyfill-mbstring/Mbstring.php',
    'ntlm_sasl_client_class' => $vendorDir . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
    'phpmailerException' => $vendorDir . '/phpmailer/phpmailer/class.phpmailer.php',
);
