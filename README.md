# seo_bundle
Manage your meta tags easily

### Installation

    composer require rudak/seo_bundle

### Enable the Bundle

    #AppKernel.php
    $bundles = [
                //...
                new Rudak\SeoBundle\RudakSeoBundle(),
            ];
### Configuration

Some parameters are required and some optional

    #config.yml
    rudak_seo:
        title: title you want
        description: Description you want
        author: RudaK
        og_title: My Website - Blog                          #optional
        og_description: My website is blue                   #optional
        og_image: relative/path/article.jpg                  #optional
        og_type: article                                     #optional
        og_locale: fr_FR                                     #optional
        fb_app_id: abcdefghijklmnopqrstuvwxyz0123456789      #optional
        
### Usage

The Meta Object is auto configured with de default values from config.yml.
You just have to call twig functions in your view for print the hydrated meta tag.

### Basic example:


    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{ seo_title() }}
        {{ seo_description() }}    
        {{ seo_author() }}
    </head>
    
Will become
    
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>your default title</title>
        <meta name="description" content="your default description">    
        <meta name="author" content="your default author">
    </head>
    
### Update the values in your controller
    
    public function blogAction($id)
        {
            $em      = $this->getDoctrine()->getManager();
            $article = $em->getRepository('AppBundle:Blog')->find($id);
    
            $metaValues  = [
                'title'       => $article->getName(),
                'description' => 'what an article ! it\'s so good',
                'author'      => $article->getAuthor(),
                'og_type'     => 'article',
            ];
            $metaBuilder = $this->get('rudak_seo.builder');
            $metaBuilder->updateMetaObject($metaValues);
    
            return $this->render('default/article.html.twig', [
                'article' => $article,
            ]);
        }
        
The values will be updated in your template.
That's all  ;)