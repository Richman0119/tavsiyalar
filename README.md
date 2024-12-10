# Tavsiyalar Loyiha

Bu loyiha foydalanuvchilarga tavsiyalar yaratish, ko'rish va boshqarish imkonini beruvchi web-saytni o'z ichiga oladi. Sayt Laravel frameworki yordamida ishlab chiqilgan.

## Loyihaning Tuzilishi

Loyiha quyidagi asosiy sahifalarni o'z ichiga oladi:
1. **Asosiy sahifa** - Bazadagi va ro‘yxatdan o‘tgan foydalanuvchilarning tavsiyalari (kategoriyalar bo‘yicha).
2. **Tavsiya qo‘shish sahifasi** - Foydalanuvchilar yangi tavsiyalar qo'shishi mumkin.
3. **Account sahifasi** - Foydalanuvchi o'z tavsiyalarini boshqarishi mumkin.

## O'rnatish

Loyihani o'rnatish uchun quyidagi qadamlarni bajaring:

1. Repositoryni klonlash:
    ```sh
    git clone https://github.com/Richman0119/tavsiyalar.git
    cd tavsiyalar
    ```

2. Composer paketlarini o'rnatish:
    ```sh
    composer install
    ```

3. Environment sozlamalarini nusxalash:
    ```sh
    cp .env.example .env
    ```

4. Environment sozlamalarini tahrirlash va `APP_NAME`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` kabi ma'lumotlarni kiritish.

5. Laravel kalitini yaratish:
    ```sh
    php artisan key:generate
    ```

6. Ma'lumotlar bazasini yaratish va migratsiyalarni bajarish:
    ```sh
    php artisan migrate
    ```

7. Storage link yaratish:
    ```sh
    php artisan storage:link
    ```

8. Serverni ishga tushirish:
    ```sh
    php artisan serve
    ```

## Foydalanish

- **Ro'yxatdan o'tish va kirish** - Foydalanuvchilar Laravel Breeze orqali autentifikatsiya qilishlari mumkin.
- **Tavsiya qo'shish** - Foydalanuvchilar yangi tavsiyalar qo'shishi va ularni boshqarishi mumkin.
- **Admin Panel** - Admin barcha foydalanuvchilarning tavsiyalarini boshqarishi mumkin.

## Hissa Qo'shish

Agar loyihaga hissa qo'shmoqchi bo'lsangiz, quyidagi qadamlarni bajaring:

1. Fork qiling.
2. O'zingizning branchingizni yarating (`git checkout -b feature/fooBar`).
3. O'zgartirishlarni commit qiling (`git commit -am 'Add some fooBar'`).
4. Branchga push qiling (`git push origin feature/fooBar`).
5. Pull request yuboring.

## Litsenziya

Bu loyiha [MIT](LICENSE) litsenziyasi ostida litsenziyalangan.
