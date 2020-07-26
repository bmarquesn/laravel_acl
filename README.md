<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

CRUD Laravel com ACL para estudo e aprendizado do mesmo. Será feito no Windows. Passos para fazê-lo:

- Instalar um servidor Apache com Banco de Dados, MySql por exemplo. Eu utilizo o [XAMPP](https://www.apachefriends.org/pt_br/index.html)
- Instalar um gerenciador de dependências, o [COMPOSER](https://getcomposer.org/)
- Abrir o CMD \(\*para cada comando digitado pressionar ENTER para rodá\-lo\)
    - Acessar o diretório onde ficará o projeto
    - Digitar o comando **composer global require laravel/installer**
    - Digitar o comando **composer create-project --prefer-dist laravel/laravel**
        - Será criada uma pasta "laravel". Pegar todos os arquivos desta pasta e colocá-los no diretório do projeto. Depois apagar esta pasta
            - Se o projeto vier do GIT, este por exemplo, será preciso baixar as libraries do Laravel \(Vendor e etc\) que estão no \.gitignore. Para isso ir no diretorio onde ficaram os arquivos baixados e digitar **composer install**
    - Definir no arquivo \.env, que fica na raiz da aplicação, a configuracao com o banco de dados
    - Para padronização e boa utilização do framework Laravel, neste projeto serão usadas as "Migrations"
        - Migrations são os arquivos que criam as tabelas no Banco de Dados
        - Digitar o comando **php artisan make:model Models\NomeDaModel -mcr** \(MODEL, COONTROLLER, RESOURCE\)
            - Resources funcionam como um camada de tratamento entre o Eloquent e as respostas JSON que são expostas pela API. Estas classes permitem que transformemos facilmente, models e collections em JSON. Em resumo, é possível estabelecer uma melhor e mais fácil comunicação entre a aplicação e a API
            - o Laravel, por padrão, salva suas Models na pasta "app". Como utilizaremos as Models dentro da pasta "app/Models" precisamos configurar o endereço da pasta no arquivo "config/auth\.php" dentro de "providers\->users\->model":
                - `'model' => App\Models\NomeModelUser::class`
        - Nos arquivos "migrate" que são criados, na função "up", inserir os campos que terão que existir na respectiva tabela
            - Consultar na URL [https://laravel.com/docs/7.x/migrations](https://laravel.com/docs/7.x/migrations) os tipos de campos para serem criados
        - Depois de criadas as migrates, digitar o comando **php artisan migrate**
    - Digitar o comando **php artisan serve**

Foi utilizado ACL. Seguidas orientações do link:
[http://www.rscoder.com/2020/05/laravel-7x-user-roles-and-permissions.html](http://www.rscoder.com/2020/05/laravel-7x-user-roles-and-permissions.html)

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
