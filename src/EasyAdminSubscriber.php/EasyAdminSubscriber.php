<?php 

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $appKernel;

    public function __construct(KernelInterface $appKernel)
    {
        $this->appKernel = $appKernel;
    }

    public static function getSubscribedEvents()
    {
        return[
            BeforeEntityPersistedEvent::class => ['setImage'],
            BeforeEntityUpdatedEvent::class=>['updateImage']

        ];
    }

    public function updateImage(BeforeEntityUpdatedEvent $event)
    {
       
        if ($_FILES['Profil']['tmp_name']['image'] != ''){
            $entity = $event->getEntityInstance();
            
            $tmp_name = $_FILES['Profil']['tmp_name']['image'];
            $filename = uniqid();
            $extension = pathinfo($_FILES['Profil']['name']['image'], PATHINFO_EXTENSION);

            $project_dir = $this->appKernel->getProjectDir();

            move_uploaded_file($tmp_name, $project_dir.'/public/uploads/'.$filename.'.'.$extension);

            $entity->setImage($filename.'.'.$extension);

        }
    }
    public function setImage(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        $tmp_name = $_FILES['Profil']['tmp_name']['image'];
        $filename = uniqid();
        $extension = pathinfo($_FILES['Profil']['name']['image'], PATHINFO_EXTENSION);

        $project_dir = $this->appKernel->getProjectDir();

        move_uploaded_file($tmp_name, $project_dir.'/public/uploads/'.$filename.'.'.$extension);

        $entity->setImage($filename.'.'.$extension);
    }
}