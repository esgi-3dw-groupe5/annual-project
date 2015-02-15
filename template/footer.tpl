        </section>
		<footer>
			<a class="footer" href="">Mentions Légales</a> -
			<a class="footer" href="">Conditions génerales d'utilisation</a> -
			<a class="footer" href="">lien 3</a> -
			<a class="footer" href="/annual-project/flux_rss.xml">RSS</a>
			<?php
		    if( $_SESSION['user']['connected'] ){
		        print("<div class='logout'>".$_SESSION['user']['pseudo']);
		        printf("<a href='%s?act=logout'>logout</a></div>",$uri);
		    }
			?>
		</footer>
	</body>
</html>
