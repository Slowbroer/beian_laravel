<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>呆河马</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 95vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                /* width: 80%; */
            }

            .title {
				text-align: center;
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
			.article-content {
				width: 80%;
				margin: 0 auto;
			}
        </style>
    </head>
    <body>
        <div class="">
            <div class="top-right links">
                <a href="{{ url('/') }}">Home</a>
            </div>

            <div class="content">
                <div class="title m-b-md" onclick="">
                    php类加载机制
                </div>

                <div class="article-content">
                @markdown
                ## yii autoload

                yii的自加载类机制分析：在yii中，通过use关键字就可以将一些php类文件加载进来，这其中的原理是和php的自加载机制是一样的，通过一些文件的位置名来自动加载类文件；  
                而yii中通过的是一些比如别名的方式让代码更容易编写，其中的流程为：
                
                
                - 首先是给一些常用的目录名进行别名设置，如：

                    Yii::setAlias('@frontend', dirname(dirname(
                    \_\_DIR\_\_)) . '/frontend');
                    这个代码对frontend进行别名设置，如果use frontend的时候，会在后面解析的时候替换成完整的frontend目录；  
                    
                - 接下来是将这个别名拼接后面的具体类，代码实现是为这样的：  

                    $classFile = static::getAlias('@' . str_replace('\\', '/', $className) . '.php', false);  
                    这里比如：frontend\models\Blog;将会被转化为/Library/WebServer/Documents/aac/frontend/models/Blog.php，所以在这里需要注意的是，**models\Blog要对应实际的目录，这样才能找到，不然就找不到了，而且类名最好和文件名一致**
                    
                - 最后一步就是通过include来添加相应的文件了；

                最后贴一个url加载后会调用哪些别名：   


                    array (size=13)
                    '@yii' => 
                        array (size=7)
                        '@yii/swiftmailer' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-swiftmailer' (length=64)
                        '@yii/gii' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-gii' (length=56)
                        '@yii/faker' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-faker' (length=58)
                        '@yii/debug' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-debug' (length=58)
                        '@yii/codeception' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-codeception' (length=64)
                        '@yii/bootstrap' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2-bootstrap' (length=62)
                        '@yii' => string '/Library/WebServer/Documents/aac/vendor/yiisoft/yii2' (length=52)
                    '@common' => string '/Library/WebServer/Documents/aac/common' (length=39)
                    '@frontend' => string '/Library/WebServer/Documents/aac/frontend' (length=41)
                    '@backend' => string '/Library/WebServer/Documents/aac/backend' (length=40)
                    '@console' => string '/Library/WebServer/Documents/aac/console' (length=40)
                    '@app' => string '/Library/WebServer/Documents/aac/frontend' (length=41)
                    '@vendor' => string '/Library/WebServer/Documents/aac/vendor' (length=39)
                    '@bower' => string '/Library/WebServer/Documents/aac/vendor/bower' (length=45)
                    '@npm' => string '/Library/WebServer/Documents/aac/vendor/npm' (length=43)
                    '@runtime' => string '/Library/WebServer/Documents/aac/frontend/runtime' (length=49)
                    '@webroot' => string '/Library/WebServer/Documents/aac/frontend/web' (length=45)
                    '@web' => string '/aac/frontend/web' (length=17)
                    '@ijackua' => 
                        array (size=1)
                        '@ijackua/lepture' => string '/Library/WebServer/Documents/aac/vendor/ijackua/yii2-lepture-markdown-editor-widget' (length=83)

                @endmarkdown
                </div>

            </div>
	</div>
	<div style="text-align:center"><a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备17142510号</a></div>
    </body>
</html>