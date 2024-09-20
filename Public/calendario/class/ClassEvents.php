<?php
namespace Classes;

use Models\ModelConnect;

class ClassEvents extends ModelConnect
{
    #Trazer os dados de eventos do banco
    public function getEvents()
    {
        try {
            $stmt = $this->conectDB()->prepare("SELECT * FROM events");
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
            if (empty($result)) {
                return json_encode(['message' => 'Nenhum evento encontrado.']);
            }
    
            return json_encode($result);
        } catch (\Exception $error) {
            return json_encode(['error' => $error->getMessage()]);
        }   
    }  
    #Criação da consulta no banco 
   
 public function createEvent($id=0, $title, $description, $color, $start, $end)
    {
        $b=$this->conectDB()->prepare("INSERT INTO events VALUES (?, ?, ?, ?, ?, ?)");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->bindParam(2, $title, \PDO::PARAM_STR);
        $b->bindParam(3, $description, \PDO::PARAM_STR);
        $b->bindParam(4, $color, \PDO::PARAM_STR);
        $b->bindParam(5, $start, \PDO::PARAM_STR);
        $b->bindParam(6, $end, \PDO::PARAM_STR);
        $b->execute();
    }

    public function createRecurringEvent($id = 0, $title, $description, $color, $start, $end, $freq = 'DAILY')
{
    // Verifica se a frequência está definida e válida
    if (is_null($freq) || !in_array($freq, ['DAILY', 'WEEKLY', 'MONTHLY', 'YEARLY'])) {
        throw new \Exception("Frequência inválida");
    }

    // Definindo variáveis
    $daysToAdd = 0;
    $interval = null;
    $repeatCount = 0;

    // Converte as strings de datas para objetos DateTime
    $startDate = new \DateTime($start);
    $endDate = new \DateTime($end);

    // Data do fim do ano atual para limitar repetições
    $endOfYear = new \DateTime('December 31 ' . $startDate->format('Y'));

    // Define o intervalo com base na frequência e calcula o repeatCount
    switch ($freq) {
        case 'DAILY':
            $daysToAdd = 1; // Diariamente
            $repeatCount = $startDate->diff($endOfYear)->days; // Repetir até o final do ano
            break;
        case 'WEEKLY':
            $daysToAdd = 7; // Semanalmente
            $repeatCount = floor($startDate->diff($endOfYear)->days / 7); // Número de semanas até o final do ano
            break;
        case 'MONTHLY':
            $interval = new \DateInterval('P1M'); // Mensalmente
            $repeatCount = $endOfYear->diff($startDate)->m + 1; // Quantos meses faltam até o final do ano
            break;
        case 'YEARLY':
            $interval = new \DateInterval('P1Y'); // Anualmente
            $repeatCount = 5; // Para eventos anuais, repete por 5 anos
            break;
    }

    // Cria os eventos recorrentes
    for ($i = 0; $i < $repeatCount; $i++) {
        // Variáveis para bindParam
        $startFormatted = $startDate->format('Y-m-d H:i:s');
        $endFormatted = $endDate->format('Y-m-d H:i:s');

        // Insere o evento na base de dados
        $b = $this->conectDB()->prepare("INSERT INTO events (id, title, description, color, start, end) VALUES (?, ?, ?, ?, ?, ?)");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->bindParam(2, $title, \PDO::PARAM_STR);
        $b->bindParam(3, $description, \PDO::PARAM_STR);
        $b->bindParam(4, $color, \PDO::PARAM_STR);
        $b->bindParam(5, $startFormatted, \PDO::PARAM_STR);
        $b->bindParam(6, $endFormatted, \PDO::PARAM_STR);
        $b->execute();

        // Adiciona o intervalo para a próxima repetição com base na frequência
        if ($freq == 'DAILY' || $freq == 'WEEKLY') {
            // Para frequências diárias ou semanais, adiciona o número de dias
            $startDate->modify("+{$daysToAdd} days");
            $endDate->modify("+{$daysToAdd} days");
        } else {
            // Para frequências mensais e anuais, usa o DateInterval
            $startDate->add($interval);
            $endDate->add($interval);
        }
    }
}


    
    
    #Buscar eventos pelo id
    public function getEventsbyId($id)
    {
        $b=$this->conectDB()->prepare("SELECT * FROM events WHERE id =?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
        return $f=$b->fetch(\PDO::FETCH_ASSOC);
    }

    #Update no Banco de Dados 
   
 public function updateEvent($title, $description, $color, $start, $id)
 {
     $b=$this->conectDB()->prepare("UPDATE events set title = ?, description = ?, color = ?, start =? WHERE id = ?");
     $b->bindParam(1, $title, \PDO::PARAM_STR);
     $b->bindParam(2, $description, \PDO::PARAM_STR);
     $b->bindParam(3, $color, \PDO::PARAM_STR);
     $b->bindParam(4, $start, \PDO::PARAM_STR);
     $b->bindParam(5, $id, \PDO::PARAM_INT);
     $b->execute();
 }

  #Deletar no Banco de Dados 
   
  public function deleteEvent($id)
  {
      $b=$this->conectDB()->prepare("DELETE FROM events WHERE id = ?");
      $b->bindParam(1, $id, \PDO::PARAM_INT);
      $b->execute();
  }

  //Atualização por arraste e redimensionamento
  public function updateDropEvent($id, $start, $end)
  {
    $b=$this->conectDB()->prepare("UPDATE events set start =?, end =? WHERE id = ?");
    $b->bindParam(1, $start, \PDO::PARAM_STR);
    $b->bindParam(2, $end, \PDO::PARAM_STR);
    $b->bindParam(3, $id, \PDO::PARAM_INT);
    $b->execute();
}
}
