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
					position详解
                </div>

                <div class="article-content">
				@markdown
				position的四个属性值：

				1.relative  
				2.absolute  
				3.fixed  
				4.static  
				下面分别讲述这四个属性。  

					<div id="parent">
						<div id="sub1">sub1</id>
						<div id="sub2">sub2</id>
					</div>

				## relative

				relative属性相对比较简单，我们要搞清它是相对哪个对象来进行偏移的。答案是它本身的位置。在上面的代码中，sub1和sub2是同级关系，如果设定sub1一个relative属性，比如设置如下CSS代码：

					#sub1
					{
						position: relative;
						padding: 5px;
						top: 5px;
						left: 5px;
					}

				我们可以这样理解，如果不设置relative属性，sub1的位置按照正常的文档流(*static*)，它应该处于某个位置。**但当设置sub1为的position为relative后，将根据top，right，bottom，left的值按照它理应所在的位置进行偏移，relative的“相对的”意思也正体现于此。**

				对于此，您只需要记住，**sub1如果不设置relative时它应该在哪里，一旦设置后就按照它理应在的位置进行偏移。**

				随后的问题是，sub2的位置又在哪里呢？答案是它原来在哪里，现在就在哪里，**它(sub2)的位置不会因为sub1增加了position的属性而发生改变。**

				如果此时把sub2的position也设置为relative，会发生什么现象？此时依然和sub1一样，按照它原来应有的位置进行偏移。

				注意: **relative的偏移是基于对象的margin的左上侧的。**

				## absolute

				这个属性总是有人给出误导。说当position属性设为absolute后，总是按照浏览器窗口来进行定位的，这其实是错误的。实际上，这是fixed属性的特点。

				当sub1的position设置为absolute后，其到底以谁为对象进行偏移呢？这里分为两种情况：

				（1）**当sub1的父对象(或曾祖父，只要是父级对象)parent也设置了position属性，且position的属性值为absolute或者relative时，也就是说，不是默认值的情况，此时sub1按照这个parent来进行定位。**

				注意，对象虽然确定好了，但有些细节需要您的注意，那就是我们到底以parent的哪个定位点来进行定位呢？如果parent设定了margin，border，padding等属性，那么这个定位点将忽略padding，将会从padding开始的地方(即只从padding的左上角开始)进行定位，也就是忽略padding，当然并不会忽略margin和border。

				接下来的问题是，sub2的位置到哪里去了呢？由于**当position设置为absolute后，会导致sub1溢出正常的文档流，就像它不属于 parent一样**，它漂浮了起来，在DreamWeaver中把它称为“层”，其实意思是一样的。此时sub2将获得sub1的位置，它的文档流不再基于 sub1，而是直接从parent开始。

				（2）如果sub1不存在一个有着position属性的父对象，那么那就会以body为定位对象，按照浏览器的窗口进行定位，这个比较容易理解。

				（3）absolute布局的时候，如果多个绝对布局的元素会重叠，所以绝对布局的元素是通过四个方向的值来定位的；**而这四个方向的值是以元素的边界为标准来进行移动的**；

				## fixed

				fixed是特殊的absolute，即fixed总是以body为定位对象的，按照浏览器的窗口进行定位,即使拖动滚动条，他的位置也是不会改变的。与background-attachment:fixed相似
				当然在Dreamweaver下似乎没有支持

				## static

				position的默认值，一般不设置position属性时，会按照正常的文档流进行排列。
				@endmarkdown
                </div>

            </div>
	</div>
	<div style="text-align:center"><a href="https://beian.miit.gov.cn/" target="_blank">粤ICP备17142510号</a></div>
    </body>
</html>