<?php 

namespace App\EventSubscriber;

use App\Entity\Promotion;
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

    public function uploadImage($event)
    {
        $entity = $event->getEntityInstance();

        $tmp_name = $_FILES['Promotion']['tmp_name']['image'];
        $filename = uniqid();
        $extension = pathinfo($_FILES['Promotion']['name']['image'], PATHINFO_EXTENSION);

        $project_dir = $this->appKernel->getProjectDir();

        move_uploaded_file($tmp_name, $project_dir.'/public/img/uploads/'.$filename.'.'.$extension);

        $entity->setImage($filename.'.'.$extension);
    }


    public function updateImage(BeforeEntityUpdatedEvent $event)
    {
        if(!($event->getEntityInstance() instanceof Promotion)){
            return;
        }

        if ($_FILES['Promotion']['tmp_name']['image'] != ''){
            $this->uploadImage($event);

        }
    }
    public function setImage(BeforeEntityPersistedEvent $event)
    {
        $this->uploadImage($event);
    }
}