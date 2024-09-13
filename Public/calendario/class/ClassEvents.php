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

    public function createRecurringEvent($id = 0, $title, $description, $color, $start, $end, $freq)
    {
        // Define o intervalo e frequência baseados na regra de recorrência
        $interval = new \DateInterval('P1D'); // Intervalo padrão de 1 dia
        switch ($freq) {
            case 'DAILY':
                $interval = new \DateInterval('P1D');
                break;
            case 'WEEKLY':
                $interval = new \DateInterval('P1W');
                break;
            case 'MONTHLY':
                $interval = new \DateInterval('P1M');
                break;
            case 'YEARLY':
                $interval = new \DateInterval('P1Y');
                break;
        }

        // Quantidade de repetições (pode ser configurada dinamicamente se necessário)
        $repeatCount = 10;

        // Converte as strings de datas para objetos DateTime
        $startDate = new \DateTime($start);
        $endDate = new \DateTime($end);

        // Cria os eventos recorrentes
        for ($i = 0; $i < $repeatCount; $i++) {
            $b = $this->conectDB()->prepare("INSERT INTO events (id, title, description, color, start, end) VALUES (?, ?, ?, ?, ?, ?)");
            $b->bindParam(1, $id, \PDO::PARAM_INT);
            $b->bindParam(2, $title, \PDO::PARAM_STR);
            $b->bindParam(3, $description, \PDO::PARAM_STR);
            $b->bindParam(4, $color, \PDO::PARAM_STR);
            $b->bindParam(5, $startDate->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
            $b->bindParam(6, $endDate->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
            $b->execute();

            // Adiciona o intervalo para a próxima repetição
            $startDate->add($interval);
            $endDate->add($interval);
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
