<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HerancasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('herancas')->insert([
            [
                'titulo' => 'Amaterasu, à deusa do sol',
                'descricao' => 'A Deusa é caracterizada pelo elemento fogo. Seus seguidores devem, a partir de agora, SEMPRE aceitar a sugestão das almas durante a jornada das almas (Pág.154), independentemente de suas próprias vontades.
                <br><br>
                Aqueles que seguem o caminho de Amaterasu são reconhecidos por serem confiantes, amigáveis, animados e, acima de tudo, muito emocionais.
                <br><br>
                <strong>HABILIDADE DO KAMI DO FOGO:</strong> Totem de chamas (uso em combate): utilizando as chamas como suas amigas, é possível criar DOIS totens de fogo advindos de Amaterasu. Um deles não ataca, mas pode tomar 1 de dano no seu lugar (e ser destruído), e o outro pode causar 2 de dano a um inimigo escolhido.',
            ],
            [
                'titulo' => 'Raijin, o deus dos raios',
                'descricao' => 'Este Kami é caracterizado pelo elemento raio. Seus seguidores devem, a partir de agora, NUNCA aceitar as sugestões das almas durante a jornada das almas (Pág.154), independentemente da escolha delas.
                <br><br>
                Aqueles que seguem o caminho de Raijin são reconhecidos por serem estratégicos, independentes ou arrogantes, e quase nada emocionais.
                <br><br>
                <strong>HABILIDADE DO KAMI DO RAIO:</strong> Medicina elétrica (uso em ou fora de combate): é possível escolher um alvo para curar 100% dos danos sofridos, remover todos os status negativos e marcações elementais, além de reviver qualquer criatura (NPC) ou personagem, independentemente de seu estado narrativo ou mecânico tanto em combate quanto fora dele. Essa habilidade pode ser utilizada apenas uma vez a cada combate, ou uma vez entre combates.',
            ],
            [
                'titulo' => 'Fuuvin, o deus do vento',
                'descricao' => 'Este Kami é caracterizado pelo elemento vento. Seus seguidores podem decidir na hora, junto das almas, quais serão seus caminhos durante a jornada das almas (Pág.154).
                <br><br>
                Aqueles que seguem o caminho de Fuujin são reconhecidos por serem livres, adaptáveis e leves, além de saberem dosar bem suas emoções.
                <br><br>
                <strong>HABILIDADE DO KAMI DO VENTO:</strong> Dispersar (uso em ou fora de combate): apenas uma vez por missão, é possível criar um forte vento divino que joga todos os inimigos à frente para longe de si, cancelando a possibilidade de um combate indesejado. Essa habilidade pode ser utilizada até mesmo contra inimigos superiores. Contudo, em todos os casos, não aplica nenhum dano.',
            ],
            [
                'titulo' => 'Tsukuyomi, o deus da lua',
                'descricao' => 'Este Kami é caracterizado pelo elemento terra. Seus seguidores precisam escolher, antes da jornada das almas começar, para qual destino desejam mandar cada alma, mantendo suas decisões independentemente da escolha da alma (Pág.154). Aqueles que seguem o caminho de Tsukuyomi são caracterizados por serem firmes, fortes e pouco emocionais.
                <br><br>
                <strong>HABILIDADE DO KAMI DA TERRA:</strong> Muralha impenetrável (uso em combate): role um d20 a cada turno. Se o número for 12 ou maior, você não receberá nenhum dano (100% de proteção).
                <br><br>
                O efeito acaba quando o resultado for 11 ou menor, e a habilidade só pode ser utilizada uma vez por combate.',
            ],
            [
                'titulo' => 'Susanoo, o deus dos mares',
                'descricao' => 'Este Kami é caracterizado pelo elemento água. Seus seguidores podem decidir na hora, junto das almas, quais serão seus caminhos durante a jornada das almas (Pág.154).
                <br><br>
                Aqueles que seguem o caminho dos mares são reconhecidos por serem calmos, porém turbulentos quando ficam irritados, além de serem extremamente emocionais.
                <br><br>
                <strong>HABILIDADE DO KAMI DA ÁGUA:</strong> Mar alternado (uso em combate): o usuário dessa técnica imita as ações do mar, mudando constantemente seus padrões. Para isso, defina antes do combate começar em qual modo você quer agir (apesar do uso dessa habilidade ser em combate, sua escolha deve ser alterada apenas entre combates):
                <br><br>
                <strong>Mar agitado:</strong> cause +1 de dano sempre que utilizar seu modo elemental ou habilidade especial com sucesso.
                <br><br>
                <strong>Mar tranquilo:</strong> receba +1 de bônus em testes de combate até o fim do combate.',
            ],
        ]);
    }
}
