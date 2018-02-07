# lpse-status-transaksi-e-tendering

[![Join the chat at https://gitter.im/lpse-status-transaksi-e-tendering/Lobby](https://badges.gitter.im/lpse-status-transaksi-e-tendering/Lobby.svg)](https://gitter.im/lpse-status-transaksi-e-tendering/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bantenprov/lpse-status-transaksi-e-tendering/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpse-status-transaksi-e-tendering/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/bantenprov/lpse-status-transaksi-e-tendering/badges/build.png?b=master)](https://scrutinizer-ci.com/g/bantenprov/lpse-status-transaksi-e-tendering/build-status/master)

[![Latest Stable Version](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/v/stable)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)
[![Total Downloads](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/downloads)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)
[![Latest Unstable Version](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/v/unstable)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)
[![License](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/license)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)
[![Monthly Downloads](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/d/monthly)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)
[![Daily Downloads](https://poser.pugx.org/bantenprov/lpse-status-transaksi-e-tendering/d/daily)](https://packagist.org/packages/bantenprov/lpse-status-transaksi-e-tendering)


Status Transaksi e-Tendering

## install via composer

- Development snapshot
```bash
$ composer require bantenprov/lpse-status-transaksi-e-tendering:dev-master
```
- Latest release:

```bash
$ composer require bantenprov/lpse-status-transaksi-e-tendering:v0.1.0
```

## download via github
~~~
bash
$ git clone https://github.com/bantenprov/lpse-status-transaksi-e-tendering.git
~~~


#### Edit `config/app.php` :
```php

'providers' => [

    /*
    * Laravel Framework Service Providers...
    */
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,
    Illuminate\Cache\CacheServiceProvider::class,
    Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
    Illuminate\Cookie\CookieServiceProvider::class,
    //....
    Bantenprov\StatusTransaksiEtendering\StatusTransaksiEtenderingServiceProvider::class,

```

#### Untuk publish component vue :

```bash
$ php artisan vendor:publish --tag=status-transaksi-e-tendering-assets
$ php artisan vendor:publish --tag=status-transaksi-e-tendering-public
```
#### Tambahkan route di dalam route : `resources/assets/js/routes.js` :

```javascript
path: '/dashboard',
component: layout('Default'),
children: [
  {
    path: '/dashboard',
    components: {
      main: resolve => require(['./components/views/DashboardHome.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Dashboard"
    }
  },
  //== ...
  {
    path: '/dashboard/status-transaksi-e-tendering',
    components: {
      main: resolve => require(['./components/views/bantenprov/status-transaksi-e-tendering/DashboardStatusTransaksiEtendering.vue'], resolve),
      navbar: resolve => require(['./components/Navbar.vue'], resolve),
      sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
    },
    meta: {
      title: "Status Transaksi Etendering"
    }
  }
```

```javascript
{
path: '/admin',
redirect: '/admin/dashboard',
component: resolve => require(['./AdminLayout.vue'], resolve),
children: [
//== ...
    {
      path: '/admin/dashboard/status-transaksi-e-tendering',
      components: {
        main: resolve => require(['./components/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingAdmin.show.vue'], resolve),
        navbar: resolve => require(['./components/Navbar.vue'], resolve),
        sidebar: resolve => require(['./components/Sidebar.vue'], resolve)
      },
      meta: {
        title: "Status Transaksi Etendering"
      }
    }
 //== ...   
  ]
},

```
#### Edit menu `resources/assets/js/menu.js`

```javascript
{
  name: 'Dashboard',
  icon: 'fa fa-dashboard',
  childType: 'collapse',
  childItem: [
        {
          name: 'Dashboard',
          link: '/dashboard',
          icon: 'fa fa-angle-double-right'
        },
        {
          name: 'Entity',
          link: '/dashboard/entity',
          icon: 'fa fa-angle-double-right'
        },
        //== ...
        {
          name: 'Status Transaksi Etendering',
          link: '/dashboard/status-transaksi-e-tendering',
          icon: 'fa fa-angle-double-right'
        }
  ]
},
//== ...
        {
          name: 'Status Transaksi Etendering',
          link: '/admin/dashboard/status-transaksi-e-tendering',
          icon: 'fa fa-angle-double-right'
        },
```

#### Tambahkan components `resources/assets/js/components.js` :

```javascript

import StatusTransaksiEtendering from './components/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtendering.chart.vue';
Vue.component('echarts-status-transaksi-e-tendering', StatusTransaksiEtendering);

import StatusTransaksiEtenderingKota from './components/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingKota.chart.vue';
Vue.component('echarts-status-transaksi-e-tendering-kota', StatusTransaksiEtenderingKota);

import StatusTransaksiEtenderingTahun from './components/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingTahun.chart.vue';
Vue.component('echarts-status-transaksi-e-tendering-tahun', StatusTransaksiEtenderingTahun);

import StatusTransaksiEtenderingAdminShow from './components/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingAdmin.show.vue';
Vue.component('admin-view-status-transaksi-e-tendering-tahun', StatusTransaksiEtenderingAdminShow);

//== Echarts Status Transaksi Etendering

import StatusTransaksiEtenderingBar01 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingBar01.vue';
Vue.component('status-transaksi-e-tendering-bar-01', StatusTransaksiEtenderingBar01);

import StatusTransaksiEtenderingBar02 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingBar02.vue';
Vue.component('status-transaksi-e-tendering-bar-02', StatusTransaksiEtenderingBar02);

//== mini bar charts
import StatusTransaksiEtenderingBar03 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingBar03.vue';
Vue.component('status-transaksi-e-tendering-bar-03', StatusTransaksiEtenderingBar03);

import StatusTransaksiEtenderingPie01 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingPie01.vue';
Vue.component('status-transaksi-e-tendering-pie-01', StatusTransaksiEtenderingPie01);

import StatusTransaksiEtenderingPie02 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingPie02.vue';
Vue.component('status-transaksi-e-tendering-pie-02', StatusTransaksiEtenderingPie02);

//== mini pie charts
import StatusTransaksiEtenderingPie03 from './components/views/bantenprov/status-transaksi-e-tendering/StatusTransaksiEtenderingPie03.vue';
Vue.component('status-transaksi-e-tendering-pie-03', StatusTransaksiEtenderingPie03);
```
