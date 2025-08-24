# E‑Commerce Shop (PHP/MySQL) 🛒

A production‑ready, full‑stack e‑commerce web app built with **HTML, CSS, JavaScript, PHP, and MySQL**. It includes a feature‑rich **Admin Dashboard**, secure **User Auth with OTP**, robust **Shopping Cart & Checkout**, and **JazzCash** payment gateway integration.

---

## ✨ Key Features

### Storefront

* 🛍️ Product listing with **search**, **filters**, and **pagination**
* 🔎 Category/brand filtering + price range slider
* 📄 Product detail page with images, stock status, variants, and description
* 🗂️ Wishlist & recently viewed (optional toggle)
* ⭐ Reviews & ratings (moderated)
* 🛒 AJAX **Add to Cart**, update quantity, remove items
* 🎟️ Coupon/discount support (percentage/fixed)
* 🌐 Fully **responsive UI** (mobile‑first)

### Authentication & Accounts

* 🔐 Login / Register with email or phone
* 🔢 **OTP verification** (email/SMS provider ready — plug your gateway)
* 🔁 Forgot/Reset password (token/OTP based)
* 👤 Profile: addresses, phone, preferences
* 🧾 Orders history & order details

### Checkout & Payments

* 🚚 Address book + shipping method selection
* 💳 **JazzCash** integration (Hosted Checkout/API) with secure signature/transaction logs
* 📦 Order placement with stock checks + transactional safety
* 🧾 Invoice generation (PDF/HTML)

### Admin Dashboard

* 🧰 Role‑based access (Admin/Manager)
* 📦 **Products CRUD** (name, SKU, price, sale price, images, stock, categories, tags)
* 🖼️ Image upload with server validation & compression
* 📁 Categories/Brands management
* 📊 Orders management (statuses: Pending, Processing, Shipped, Delivered, Canceled/Refunded)
* 👥 Users management (activate, reset, roles)
* 🎟️ Coupons management (min spend, usage limits, expiry)
* 📈 Analytics (sales, top products, low stock, new users)

### System & Quality

* 🧱 Clean MVC‑like structure (Controllers/Models/Views)
* 🛡️ Security: prepared statements, CSRF tokens, XSS sanitization, password hashing
* 🧪 Server‑side validation + graceful error handling/logs
* ⚙️ Config via **.env** (DB, mail/SMS, JazzCash)
* 📬 Mailer ready (SMTP) for OTP & order emails

---

## 🧰 Tech Stack

* **Frontend:** HTML5, CSS3, JavaScript (vanilla + Fetch/AJAX)
* **Backend:** PHP 8+
* **Database:** MySQL 5.7+/8+
* **Payments:** JazzCash
* **Auth:** Sessions + OTP (email/SMS provider)

---

## 🔐 OTP Flow (Email/SMS)

1. User submits login/register with phone/email.
2. Server generates a **6‑digit code** → stores hash + expiry in `otp_codes`.
3. Sends code via configured channel (SMTP or SMS API).
4. User verifies code → set `users.is_verified = 1`, start session.
5. Throttle attempts; expire codes after N minutes; mark used codes.

---

## 💳 JazzCash Integration (Overview)

1. Build transaction payload (amount, bill ref, dateTime, return URL, etc.).
2. Generate **secure hash** using Integrity Salt.
3. Redirect to **JazzCash Hosted Checkout** (or POST to API endpoint).
4. On return/callback, **verify hash** + query transaction status.
5. If success → create order, mark `payments.status = SUCCESS`, reduce stock.
6. If failed/canceled → log, show message, allow retry.

---


