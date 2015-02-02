<?php
function &init_news_rss(&$xml_file)
{
        $root = $xml_file->createElement("rss"); // création de l'élément
        $root->setAttribute("version", "2.0"); // on lui ajoute un attribut
        $root = $xml_file->appendChild($root); // on l'insère dans le nœud parent (ici root qui est "rss")
       
        $channel = $xml_file->createElement("channel");
        $channel = $root->appendChild($channel);
               
        $desc = $xml_file->createElement("categorie");
        $desc = $channel->appendChild($desc);
        $text_desc = $xml_file->createTextNode("sport"); // on insère du texte entre les balises <description></description>
        $text_desc = $desc->appendChild($text_desc);
       
        $link = $xml_file->createElement("link");
        $link = $channel->appendChild($link);
        $text_link = $xml_file->createTextNode("http://localhost/annual-project");
        $text_link = $link->appendChild($text_link);
       
        $title = $xml_file->createElement("title");
        $title = $channel->appendChild($title);
        $text_title = $xml_file->createTextNode("Test flux RSS");
        $text_title = $title->appendChild($text_title);

        $title = $xml_file->createElement("date");
        $title = $channel->appendChild($title);
        $text_title = $xml_file->createTextNode("26/01/2015");
        $text_title = $title->appendChild($text_title);
       
        return $channel;
}
 
function add_news_node(&$parent, $root, $id, $titre, $date)
{
        $item = $parent->createElement("item");
        $item = $root->appendChild($item);
       
        $title = $parent->createElement("title");
        $title = $item->appendChild($title);
        $text_title = $parent->createTextNode($titre);
        $text_title = $title->appendChild($text_title);
       
        $link = $parent->createElement("link");
        $link = $item->appendChild($link);
        $text_link = $parent->createTextNode("http://www.bougiemind.info/rss_news".$id.".html");
        $text_link = $link->appendChild($text_link);
       
        $com = $parent->createElement("comments");
        $com = $item->appendChild($com);
        $text_com = $parent->createTextNode("http://www.bougiemind.info/news-11-".$id.".html");
        $text_com = $com->appendChild($text_com);
       
        $pubdate = $parent->createElement("pubDate");
        $pubdate = $item->appendChild($pubdate);
        $text_date = $parent->createTextNode($date);
        $text_date = $pubdate->appendChild($text_date);
       
        $guid = $parent->createElement("guid");
        $guid = $item->appendChild($guid);
        $text_guid = $parent->createTextNode("http://www.bougiemind.info/rss_news".$id.".html");
        $text_guid = $guid->appendChild($text_guid);
       
        $src = $parent->createElement("source");
        $src = $item->appendChild($src);
        $text_src = $parent->createTextNode("http://localhost_annual-project");
        $text_src = $src->appendChild($text_src);
}
 
function rebuild_rss()
{
        // on se connecte à la BDD
        require_once(__ROOT__."/model/dbconnect.php");
        $link = db_connect();
 
        // on récupère les news
        $nws = db_get_articles($link);
 
        // on crée le fichier XML
        $xml_file = domxml_new_doc("1.0");
 
        // on initialise le fichier XML pour le flux RSS
        $channel = init_news_rss($xml_file);
 
        // on ajoute chaque news au fichier RSS
        while($news = $nws->fetch())
        {
                add_news_node($xml_file, $channel, $news["id"], $news["title"], $news["date"]);
        }
       
        // on écrit le fichier
        $xml_file->dump_file("news_FR_flux.xml");
}
?>