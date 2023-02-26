# k1ttyf/meowsms-php
Библиотека для использования [@MeowSMSBot](https://t.me/MeowSMSBot) API в PHP. Основано на [MeowSMS API](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/).

[![License](https://img.shields.io/github/license/k1ttyf/meowsms-php)](https://github.com/k1ttyf/meowsms-php/blob/main/LICENSE)
![Packagist Downloads](https://img.shields.io/packagist/dt/k1ttyf/meowsms)
![GitHub release (latest by date including pre-releases)](https://img.shields.io/github/v/release/k1ttyf/meowsms-php?include_prereleases)
![GitHub last commit](https://img.shields.io/github/last-commit/k1ttyf/meowsms-php)

## 🛠 Установка

Выполните эту команду в командной строке:
```php
composer require k1ttyf/meowsms
```

## 🔌 Использование

### [🕊 Работа с SMS](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-sms)

#### [📦 sendSMS | Отправить шаблонное SMS](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-sms/sendsms-or-otpravit-shablonnoe-sms)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$params = [
    "number" => 393511929960,
    "service" => "wallapopes",
    "template" => 2,
    "link" => "https://t.me/k1ttyf",
    "worker_id" => 1710602960
];

$result = $meow->sendSMS($params);

var_dump($result);
```

#### [📲 sendCustomSMS | Отправить персональное SMS](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-sms/sendcustomsms-or-otpravit-personalnoe-sms)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$params = [
    "number" => 393511929960,
    "name" => "CAIXA",
    "text" => "test api meowsms",
    "worker_id" => 1710602960
];

$result = $meow->sendCustomSMS($params);

var_dump($result);
```

#### [🔄 getSMSStatus | Проверить статус отправки](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-sms/getsmsstatus-or-proverit-status-otpravki)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$params = [
    "message_id" => 41448
];

$result = $meow->getSMSStatus($params);

var_dump($result);
```

### [🔗 Работа с ссылками](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-ssylkami)

#### [✂️ cuttLink | Сократить ссылку](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-ssylkami/cuttlink-or-sokratit-ssylku)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$params = [
    "link" => "https://t.me/k1ttyf"
];

$result = $meow->cuttLink($params);

var_dump($result);
```

#### [🔍 checkDomainStatus | Проверка домена](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/rabota-s-ssylkami/checkdomainstatus-or-proverka-domena)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$params = [
    "link" => "https://t.me/k1ttyf"
];

$result = $meow->checkDomainStatus($params);

var_dump($result);
```

### [ℹ️ Получение информации](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/poluchenie-informacii)

#### [💸 getBalance | Получение баланса API-ключа](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/poluchenie-informacii/getbalance-or-poluchenie-balansa-api-klyucha)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$result = $meow->getBalance();

var_dump($result);
```

#### [🚚 getServices | Получение всех сервисов](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/poluchenie-informacii/getservices-or-poluchenie-vsekh-servisov)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$result = $meow->getServices();

var_dump($result);
```

#### [🌎 getCountrys | Получение всех страны](https://meowsms.gitbook.io/meowsmsbot-or-dokumentaciya-api/poluchenie-informacii/getcountrys-or-poluchenie-vsekh-strany)

```php
<?php

require_once "vendor/autoload.php";

$meow = new k1ttyf\meowsms\MeowSMS("your api_key");

$result = $meow->getCountrys();

var_dump($result);
```

## 💣 Устранение неполадок

Пожалуйста, если вы нашли какие-либо ошибки или неточности - [сообщите об этом](https://github.com/k1ttyf/meowsms-php/issues)
