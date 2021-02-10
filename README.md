## Form Manager

Create and update forms, share it and export answers to excel.

### Features
- ~~Create form.~~ (Form designer not finished yet, you must add forms to database)
- Export answers to Excel.
- Select date when exporting.
- Send e-mail to admin when a form filled.

_________________

<div align="center"><strong>Admin panel screen</strong></div>

![](https://image.nixarsoft.com/di/KNE9/Screen_Shot_2021-01-15_at_10.png)

_________________

<div align="center"><strong>Example forms</strong></div>

<br />
<div align="center">
    <a href="https://form.nixarsoft.com/tercih-edilen-programlama-dilleri" target="_blank">
        Tercih Edilen Programlama Dilleri
    </a>
</div>


![](https://image.nixarsoft.com/di/RKRJ/Screen_Shot_2021-01-15_at_10.png)

<br />

<div align="center">
    <a href="https://form.nixarsoft.com/yazilimci-anketi" target="_blank">
        Yazılımcı Anketi
    </a>
</div>

![](https://image.nixarsoft.com/di/DJRM/Screen_Shot_2021-01-15_at_10.png)

_________________

## Installation

```
git clone https://github.com/kodmanyagha/FormManager.git
cd FormManager
composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
yarn
yarn build
nano .env  #for database settings
```

Set database and e-mail settings in here and save it. After that you can login to admin panel, create forms, share forms and get reports. If you want to receive answers via e-mail you must execute the queue. And don't forget to add inform email to `forms.feedback_email` table column. 

```
php artisan queue:work
```

You can use the `startqueue.sh` file for automatically start at server restart.

## Customization

You can change logo in `storage/app/public/form/assets/img/logo.png` and `logo.gif` files. `logo.png` file is using in frontend, `logo.gif` file is usin in e-mail template.

Nice forms...


