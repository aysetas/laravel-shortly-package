# Laravel Shortly Url Package

Laravel Shortly Package, Laravel projelerinde kolayca linkleri kısaltmanıza olanak tanır.

## Kurulum

Paketi Composer kullanarak kurabilirsiniz:

```bash
composer require aysetas/laravel-shortly-url
```

## Kullanım

Paketin nasıl kullanılacağına dair örnekler ve açıklamalar:

#### Link Kısaltma Oluşturma

Paket, uzun URL'leri kısaltmak için `getUrl` yöntemini sağlar. Bu yöntemi kullanarak uzun bir URL'yi kısaltabilirsiniz.

```bash
use Aysetas\ShortlyPackage\Facades\Shortly;

$shortUrl = Shortly::getUrl('https://example.com');

echo $shortUrl; //lu8TSUzec
```

#### Kısa Linki Eski Hale Dönüştürme

Paket ayrıca kısa bir URL'yi eski URL'ye dönüştürmek için `expandUrl` yöntemini sağlar. Bu yöntemi kullanarak, bir kısa kodu (short code) eski URL'ye dönüştürebilirsiniz.

```bash
use Aysetas\ShortlyPackage\Facades\Shortly;

$shortCode = "lu8TSUzec";

$originalUrl = Shortly::expandUrl($shortCode);

echo $originalUrl;
```

#### Linkte Tıklama Sayısı Alma

Paket ayrıca bir kısa URL'ye ait tıklama sayısını almak için `getHits` yöntemini sağlar. Bu yöntemi kullanarak, bir kısa kodun (short code) tıklama sayısını alabilirsiniz.

```bash
use Aysetas\ShortlyPackage\Facades\Shortly;

$shortCode = "lu8TSUzec";

$hits = Shortly::getHits($shortCode);

echo $hits;
```


