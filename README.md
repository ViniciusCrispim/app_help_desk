# app_help_desk
Aplicação de abertura/consulta de chamados utilizando PHP

1- A página index.php faz a autenticação do usuário:
  A lógica de autenticação e os perfis dos usuários estão no script "valida_login.php";
  Os perfis são divididos entre ADM e USER;
   - Perfis administradores podem ver todos os chamados;
   - Perfis usuários podem consultar apenas seus próprios chamados.
   
2- Na página home.php dá acesso à abertura(abrir_chamado.php) e consulta(consultar_chamado.php) de chamados;
  As páginas home.php/abrir_chamado.php/consultar_chamado.php não podem ser acessadas sem que haja a autenticação me primeiro lugar.

3- Na página abrir_chamado.php, o usuário preenche os dados relativos ao chamado, que é gravado em um arquivo(registro_chamados.hd);
  No processo de gravação, é utilizado o ID do usuário do perfil para identificar quem abriu o chamado;
  O ID do usuário é disponibilizado através das variáveis de sessão($_SESSION['id']) iniciado no processo de autenticação.
  
4- Na página consultar_chamado.php, existe uma lógica de recuperação dos chamados de acordo com o perfil do usuário.
  Os dados são recuperados de uma vez:
  - Se for AMD, o array com todos os chamados é exibido;
  - Se for USER, verifica o ID do usuário e retira todos os outros do array, para então ser exibido.
