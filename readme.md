Olá, Dev.

Antes de começar a alterar este tema instale as dependências necessárias rodando o seguinte comando:

npm install

Após instalar as dependências, rode o comando abaixo para compilar automaticamente qualquer JS e CSS modificado:

gulp watch

** Arquivos JS, CSS e imagens devem ser alterados através da pasta /src e utilizados a partir da pasta /assets. 

*** Utilize a função get_asset() para retornar o caminho real do arquivo. Ex: Se você tem um arquivo src/img/imagem.jpg para utilizá-lo use a função get_asset('img/imagem.jpg)