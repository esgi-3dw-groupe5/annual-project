        </section>
		<footer>
		<?php
		    if( $_SESSION['user']['connected'] ){
		        print($_SESSION['user']['pseudo']);
		        printf("<a href='%s?act=logout'>logout</a>",$uri);
		    }
		?>
<!-- 			<div>
				<a href="">Mentions Légales</a> -
				<a href="">Conditions génerales d'utilisation</a> -
				<a href="">lien 3</a> -
				<a href="/annual-project/flux_rss.xml">RSS</a>
			</div> -->
		</footer>
	</body>
</html>
