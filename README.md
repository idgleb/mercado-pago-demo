# 💳 Laravel + Mercado Pago (Checkout Pro) Demo

Este proyecto es un ejemplo mínimo funcional para procesar pagos de $100 ARS usando [Mercado Pago Checkout Pro](https://www.mercadopago.com.ar/developers/en/docs/checkout-pro) con Laravel 12, Sail (Docker) y ngrok.

---

## 🚀 Requisitos

- [Docker Desktop](https://www.docker.com/products/docker-desktop)
- [WSL2 + Ubuntu](https://learn.microsoft.com/es-es/windows/wsl/install)
- [Ngrok](https://ngrok.com/download)
- Cuenta de desarrollador de [Mercado Pago](https://www.mercadopago.com.ar/developers/panel)

---

## ⚙️ Instalación

```bash
curl -s https://laravel.build/mercado-pago-demo | bash
cd mercado-pago-demo
./vendor/bin/sail up -d
./vendor/bin/sail composer require mercadopago/dx-php
