# Simplify - Dados e Gestão (MVP)

Protótipo funcional (MVP) desenvolvido para o **Projeto Integrador do 4º semestre** do curso de Tecnologia em Análise e Desenvolvimento de Sistemas do Centro Universitário Senac 2026 (EAD).

**Tema:** Desenvolvimento de sistemas orientados a dispositivos móveis e baseados na web.

**Orientadores:** Prof. Anderson Clayton Garcia Lopes e Prof.ª Ruth Garcia.

**Integrantes:** David Mucci, Elton José da Silva, Gabriel Henrique Ferreira da Silva, Gilson de Carvalho, Nathan Nicolau de Oliveira, Paloma Aragão Balbino da Silva e Ricardo Maciel Oliveira.

## Sobre o MVP

O Simplify é um sistema web responsivo para pequenos negócios. Para provar o conceito escolhemos a **jornada da persona Juliana (vendedora)**: consultar um produto e registrar uma venda pelo celular durante o atendimento, sem precisar ir até o computador.

1. **Acesso:** Apresentar uma tela simples, com campos grandes e opção de mostrar a senha.
2. **Escolha da tarefa:** Destacar as ações mais usadas em uma área de acesso rápido.
3. **Consulta do produto:** Permitir pesquisa por nome, código e categoria, mostrando resultados claros.
4. **Conferência da informação:** Organizar os dados principais em destaque e deixar informações secundárias separadas.
5. **Registro da venda:** Usar botões adequados ao celular e informar se a operação foi concluída.
6. **Confirmação:** Exibir uma mensagem clara, com opção de consultar o histórico.
7. **Continuidade do atendimento:** Permitir iniciar uma nova consulta diretamente pela tela de conclusão.
8. **Acompanhamento do gestor:** Atualizar os dados na mesma base e registrar usuário, data e horário.

## Tecnologias

**Frontend**
- HTML5 + CSS3
- Bootstrap 5.3.8 (para visual e responsividade)
- JavaScript (só pra mostrar/esconder senha)

**Backend**
- PHP 8
- Arquitetura MVC
- PDO para conexão com o banco
- Sessões do PHP para login

**Banco de dados**
- MySQL 8
- Script em `database/simplify.sql`

## Servidor de desenvolvimento

Usamos o **XAMPP** (Apache + MySQL + PHP), versão com PHP 8 ou superior.

**Testar no celular:** com o celular na mesma rede Wi-Fi, acesse `http://IP-DO-COMPUTADOR/simplify` (ex: `http://192.168.0.10/simplify`).

## Usuários de teste

| Perfil | E-mail | Senha |
|---|---|---|
| Gestor (Marcos) | marcos@simplify.com | 123 |
| Vendedor (Juliana) | juliana@simplify.com | 123 |

O vendedor não vê o menu "Vendas" (histórico), só o gestor.

## Limitações (é um MVP)

- Não tem validação dos campos dos formulários.
- Uma venda tem apenas um produto.
- Não verifica se a quantidade vendida é maior que o estoque.
- Câmera/código de barras, relatórios e histórico de alterações ficam para próximas versões.