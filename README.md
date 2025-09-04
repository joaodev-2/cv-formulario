
# CV Formulário

Aplicação em Laravel com banco de dados SQLite para envio de currículos. Inclui validação de dados, upload de arquivos (doc, docx, pdf), registro de IP e data/hora, envio de confirmação por e-mail via SMTP e testes automatizados com PHPUnit.

---

## 🚀 Tecnologias Utilizadas

- **Backend**: Laravel
- **Banco de Dados**: SQLite
- **Validação**: Laravel Validation
- **Upload de Arquivos**: Laravel Filesystem
- **Envio de E-mails**: SMTP com Laravel Mail
- **Testes Automatizados**: PHPUnit
- **Controle de Versão**: Git Flow

---

## 📦 Funcionalidades

- Validação de dados de entrada
- Upload de arquivos de currículo (doc, docx, pdf)
- Registro de IP e data/hora do envio
- Envio de e-mail de confirmação
- Testes automatizados com PHPUnit

---

## 🛠️ Instalação

1. Clone o repositório:

   ```bash
   git clone https://github.com/joaodev-2/cv-formulario.git
   cd cv-formulario


2. Instale as dependências:

   ```bash
   composer install
   ```

3. Configure o ambiente:

   ```bash
   cp .env.example .env
   ```

   Edite o arquivo `.env` com suas configurações de banco de dados e SMTP.

4. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

5. Execute as migrações:

   ```bash
   php artisan migrate
   ```

---

## 🧪 Testes

Para rodar os testes automatizados:

```bash
php artisan test
```

---

## 🧭 Fluxo de Trabalho com Git Flow

Este projeto segue o modelo Git Flow para gerenciamento de branches:

* **main**: Contém o código de produção.
* **develop**: Contém o código de desenvolvimento.
* **feature/**: Branches para desenvolvimento de novas funcionalidades.
* **release/**: Branches para preparação de novas versões.
* **hotfix/**: Branches para correção de bugs críticos.

---

## 📄 Licença

Este projeto está licenciado sob a Licença MIT - veja o arquivo [LICENSE](LICENSE) para mais detalhes.

