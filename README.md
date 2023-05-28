# HackathonFebraban 2019

This repository contains the code for the project developed during the Hackathon CIAB FEBRABAN 2019 with the theme "Entender para Atender Melhor os Clientes na era da Economia Analítica". The objective was to create solutions that could extract insights and perform predictive analyses that generate benefits for banks and society.

## Overview

The project aims to improve the experience and efficiency in the processes of:

- onboarding and verifying new clients
- preventing frauds and authentication issues
- extracting insights about clients' credit profiles 
- reducing defaulting and protecting clients from excessive debt
- protecting clients' data and comply with legal requirements

## Repository Structure

The main script in this repository is [`main.js`](https://github.com/FernandoSLuz/HackathonFebraban_2019/blob/master/main.js), which contains the implementation of a simple blockchain using SHA256 algorithm for hashing and Express as the web application framework.

```
.
├── main.js                   # Main script, creating a simple blockchain
└── WebApi/                   # Web API files for various features
    ├── consult_score.php      # Consult credit score
    ├── consult_score_form.php # Form for consulting score
    ├── create_new_bank.php    # Create new bank account
    ├── create_new_bank_form.php # Form for new bank account creation
    ├── create_new_score.php   # Create new credit score
    ├── create_new_score_form.php  # Form for creating new score
    ├── create_new_user.php    # Create new user
    ├── create_new_user_form.php # Form for creating new user
    └── index.php             # Index page
```

## How to Run

1. Install [Node.js](https://nodejs.org/)
2. Clone this repository
3. Navigate to the root directory of the project
4. Install the required packages:
```
npm install express mongoose crypto-js
```
5. Start the application:
```
node main.js
```
6. Open your browser and navigate to `http://localhost:1133/`

## License

Since there's no specific license provided, I decided to go with **MIT License**. The full license text can be found in the [LICENSE file](LICENSE).
