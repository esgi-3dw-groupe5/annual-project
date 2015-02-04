jQuery(document).ready(function()
{
   // On cache la zone de texte
   jQuery('#toggle_user').show();
   jQuery('#toggle_article').hide();
   jQuery('#toggle_theme').hide();
   jQuery('#toggle_commentaire').hide();
   // toggle() lorsque le lien avec l'ID #toggler est cliqué
   jQuery('a#toggler_user').click(function()
   {
       jQuery('#toggle_user').show();
       jQuery('#toggle_article').hide();
       jQuery('#toggle_theme').hide();
       jQuery('#toggle_commentaire').hide();
      return false;
   });

   jQuery('a#toggler_article').click(function()
   { 
       jQuery('#toggle_user').hide();
       jQuery('#toggle_theme').hide();
       jQuery('#toggle_commentaire').hide(); 
       jQuery('#toggle_article').show();
       
       return false;
   });

   jQuery('a#toggler_theme').click(function()
   { 
       jQuery('#toggle_user').hide();
       jQuery('#toggle_article').hide();
       jQuery('#toggle_commentaire').hide(); 
       jQuery('#toggle_theme').show();
       
       return false;
   });
     jQuery('a#toggler_commentaire').click(function()
   { 
       jQuery('#toggle_user').hide();
       jQuery('#toggle_article').hide();
       jQuery('#toggle_theme').hide();
       jQuery('#toggle_commentaire').show();
       
       return false;
   });
});