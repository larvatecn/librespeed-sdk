# LibreSpeed SDK

<a href="https://github.com/larvatecn/librespeed-sdk/actions"><img src="https://github.com/larvatecn/librespeed-sdk/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/larva/librespeed-sdk"><img src="https://img.shields.io/packagist/dt/larva/librespeed-sdk" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/larva/librespeed-sdk"><img src="https://img.shields.io/packagist/v/larva/librespeed-sdk" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/larva/librespeed-sdk"><img src="https://img.shields.io/packagist/l/larva/librespeed-sdk" alt="License"></a>

## Introduction

The [LibreSpeed SDK](https://www.librespeed.cn/sdk) SDK provides an expressive interface for interacting with Forge's API and managing Laravel Forge servers.

## Official Documentation

### Installation

To install the SDK in your project you need to require the package via composer:

```bash
composer require larva/librespeed-sdk
```

### Basic Usage

You can create an instance of the SDK like so:

```php
$libreSpeed = new LibreSpeed\LibreSpeed(TOKEN_HERE);
```

Using the `LibreSpeed` instance you may perform multiple actions as well as retrieve the different resources LibreSpeed's API provides:

```php
$servers = $libreSpeed->servers();
```

## License

Larva Forge SDK is open-sourced software licensed under the [MIT license](LICENSE.md).
