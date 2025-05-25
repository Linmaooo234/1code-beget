<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ренессанс</title>
	<link rel="stylesheet" href="{{ asset('style/mainpage.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<script src="../gsap/gsap.min.js" defer></script>
	<script src="../gsap/ScrollTrigger.min.js" defer></script>
	<script src="../gsap/ScrollSmoother.min.js" defer></script>
	<meta name = "keywords" content = "web,427,project">
    <meta name = "author" content = "Закирова Камила Рустамовна">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="shortcut icon" href="/storage/media/fawikon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="wrapper">
		<div class="content">
			<header class="main-header">
				<div class="layers">
					<div class="layer layers__base" style="background-image: url(/storage/media/layer-base.png);"></div>
					<div class="layer layers__middle" style="background-image: url(/storage/media/layer-middle.png);"></div>
					<div class="layer layers__front" style="background-image: url(/storage/media/layer-front.png);"></div>
				</div>
			</header>

			<article class="main-article" style="background-image: url(/storage/media/fon.png);">
				<div class="main-article__content">
					<h2 class="main-article__header">ТЕАТР КОТОРЫЙ ИЗМЕНИЛ МИР</h2>
					<p class="main-article__paragraph">Высокохудожественный репертуар, основанный на лучших произведениях русской и мировой классики и современной драматургии; профессиональная стабильная труппа, в составе которой много крупных мастеров сцены; остросовременная режиссура и сценография, не чуждые духу поисков и экспериментов, жанровое разнообразие постановок делают театр привлекательным и интересным самым широким слоям публики как у себя в городе, так и далеко за его пределами.</p>
				</div>
			</article>

			<article class="main-article">
			<div class="video-block">
			<img src="/storage/media/video.gif" alt="Описание GIF">
		<div class="content">
		  <h1>ПОГРУЗИТЕСЬ В МИР ВЫСОКОГО ИСКУССТВА УЖЕ СЕЙЧАС</h1>
		  <a href="{{ route('pages.index')  }}"><button>Купить билеты</button>
		</div>
	  </div>
			</article>
		</div>
	</div>
    <script>
    window.addEventListener('scroll', e => {
        document.documentElement.style.setProperty('--scrollTop', `${this.scrollY}px`) // Update method
    })
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother)
    ScrollSmoother.create({
        wrapper: '.wrapper',
        content: '.content'
    })
    </script>


</body>
</html>
