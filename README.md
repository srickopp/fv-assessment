# FV Assessment - Senior Programming Test

The assessment question is composed of 3 questions. This project is to solve the question 2 and 3.
The stack that I used is Laravel Frameworks.

I did for question number 1 that has been a drop in this link: [Google Docs](https://docs.google.com/document/d/1EEhTiSzJJXOmNes5b-Sv4PcDeSSdfAkdnvExk9aNmj0/edit?usp=sharing).

## Environment File Adjustment

The first step is to adjust the env file. Just copy the .env-example and rename it to .env.
And then you need to adjust the database information value.

## Dependency Installations

Install all dependencies after cloning these projects

```bash
composer install
```

## Running Migrations

Before starting this project, you need to run the migrations to so migrate the database structure and seed some example data with this command.

```bash
php artisan migrate:refresh --seed
```

## Start The Projects!

Your project is already set up and ready to start.

```bash
php artisan serve
```

Now, you can visit the URL at http://localhost:8000

## Assessment Solutions

As per the Question, there are 2 questions that used this project to solve/answer the problem.
I already prepare two methods using API and GUI.

<b>Question 2</b>

<img src="https://img.shields.io/static/v1?label=Questions 2&message=API Format&color=blue"><br>

```
Method: GET
URL: /api/question2
```

<img src="https://img.shields.io/static/v1?label=Questions 2&message=GUI Format&color=yellow"><br>

```
URL: /booking
```

<b>Question 3</b>

<img src="https://img.shields.io/static/v1?label=Questions 3&message=API Format&color=blue"><br>

```
Method: POST
URL: /api/question3
Body: {
    "address1": "string|required",
    "address2": "string",
    "address3": "string",
}
```

<img src="https://img.shields.io/static/v1?label=Questions 2&message=GUI Format&color=yellow"><br>

```
URL: /address
```

## Testing

To start a testing project you can run this command

```bash
php artisan test
```

## Author

Samuel Ricko Perdana Putra
