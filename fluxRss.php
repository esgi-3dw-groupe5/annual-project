<?php
function update_fluxRSS(){
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<rss version="2.0">';
        $xml .= '<channel>';
        $xml .= ' <title>Pinnackl</title>';
        $xml .= ' <link>http://localhost</link>';
        $xml .= ' <description>Pinnackl ! Agrégateur d\'actualités</description>';
        $xml .= ' <language>fr</language>';
        $xml .= ' <copyright>Pinnackl.eu</copyright>';
        $xml .= ' <managingEditor>rss@monsite-craym.eu</managingEditor>';
        $xml .= ' <category>Flux RSS</category>';
        $xml .= ' <generator>PHP/MySQL</generator>';
        $xml .= ' <docs>http://www.rssboard.org</docs>';

        $index_selection = 0;
        $limitation = 1;
        $link = db_connect();
        $resultat = db_get_articles_rss($link,$limitation,$index_selection);

        while($data = $resultat->fetch()){
                $cat = db_get_category_tag($link,$data['id_category']);
                $data_cat = $cat->fetch();
                $xml .= '<item>';
                $xml .= '<title>'.'['.$data_cat['tag'].']'.stripcslashes($data['title']).'</title>';
                $xml .= '<link>'.'http://localhost/'.$data_cat['tag'].'/'.$data['title_id'].'</link>';
                $xml .= '<guid isPermaLink="true">'.'http://localhost/'.$data_cat['tag'].'/'.$data['title_id'].'</guid>';
                $xml .= '<pubDate>'.(date("D, d M Y H:i:s O", strtotime($data['date']))).'</pubDate>';
                $xml .= '<author>'.stripcslashes($data['author']).'</author>';
                $xml .= '</item>'; 
        }
        $resultat->closeCursor();
        $xml .= '</channel>';
        $xml .= '</rss>';

        $fp = fopen("flux_rss.xml", 'w+');
 
        //On écrit notre flux RSS
        fputs($fp, $xml);
         
        //Puis on referme le fichier
        fclose($fp);
}
?>