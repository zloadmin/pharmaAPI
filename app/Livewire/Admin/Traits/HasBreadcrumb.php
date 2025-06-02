<?php
declare(strict_types=1);


namespace App\Livewire\Admin\Traits;


use App\Models\Laboratory;
use App\Models\Component;
use App\Models\LaboratoryStep;
use App\Models\PharmacologicalArticle;
use App\Models\Video;

trait HasBreadcrumb
{
    private function getHomeItem(): array
    {
        return [route('admin.dashboard-page') => 'Панель'];
    }

    private function getStorageComponentsItem(): array
    {
        return [route('admin.components-page') => 'Компоненты'];
    }

    private function getLaboratoryItem(): array
    {
        return [route('admin.laboratories-page') => 'Лабораторные работы'];
    }

    private function getPharmacologicalArticleItem(): array
    {
        return [route('admin.pharmacological-articles-page') => 'Фармакологические статьи'];
    }
    private function getLaboratorySessionsPageItem(): array
    {
        return [route('admin.laboratory-sessions') => 'Сессии'];
    }
    private function getVideoItem(): array
    {
        return [route('admin.videos-page') => 'Видео'];
    }


    private function getStorageComponentCreateItem(): array
    {
        return [route('admin.component-create-page') => 'Создать'];
    }

    private function getStorageComponentEditItem(Component $storageComponent): array
    {
        return [route('admin.component-edit-page', $storageComponent) => 'Редактировать'];
    }

    private function getLaboratoryEditItem(Laboratory $laboratory): array
    {
        return [route('admin.laboratory-edit-page', $laboratory) => 'Редактировать ' . $laboratory->name];
    }
    private function getLaboratoryStepsItem(Laboratory $laboratory): array
    {
        return [route('admin.laboratory-steps-page', $laboratory) => 'Задачи'];
    }
    private function getLaboratoryStepCreateItem(Laboratory $laboratory): array
    {
        return [route('admin.laboratory-step-create-page', $laboratory) => 'Создать'];
    }
    private function getLaboratoryStepEditItem(Laboratory $laboratory, LaboratoryStep $laboratoryStep): array
    {
        return [route('admin.laboratory-step-edit-page', [$laboratory, $laboratoryStep]) => 'Редактировать'];
    }
    private function getPharmacologicalArticleEditItem(PharmacologicalArticle $article): array
    {
        return [route('admin.pharmacological-article-edit-page', $article) => 'Редактировать'];
    }
    private function getVideoEditItem(Video $video): array
    {
        return [route('admin.video-edit-page', $video) => 'Редактировать'];
    }

    private function getLaboratoryCreateItem(): array
    {
        return [route('admin.laboratory-create-page') => 'Создать'];
    }

    private function getPharmacologicalArticleCreateItem(): array
    {
        return [route('admin.pharmacological-article-create-page') => 'Создать'];
    }
    private function getVideoCreateItem(): array
    {
        return [route('admin.video-create-page') => 'Создать'];
    }

    private function getLaboratoryPageBreadcrumb(): array
    {
        return $this->getLaboratoryItem();
    }

    private function getPharmacologicalArticlesPageBreadcrumb(): array
    {
        return $this->getPharmacologicalArticleItem();
    }
    private function getLaboratorySessionsPageBreadcrumb(): array
    {
        return $this->getLaboratorySessionsPageItem();
    }
    private function getVideosPageBreadcrumb(): array
    {
        return $this->getVideoItem();
    }

    private function getStorageComponentsPageBreadcrumb(): array
    {
        return $this->getStorageComponentsItem();
    }

    private function getStorageComponentCreatePageBreadcrumb(): array
    {
        return $this->getStorageComponentsItem() + $this->getStorageComponentCreateItem();
    }

    private function getStorageComponentEditPageBreadcrumb(Component $storageComponent): array
    {
        return $this->getStorageComponentsItem() + $this->getStorageComponentEditItem($storageComponent);
    }

    private function getLaboratoryEditPageBreadcrumb(Laboratory $laboratory): array
    {
        return $this->getLaboratoryItem() + $this->getLaboratoryEditItem($laboratory);
    }
    private function getLaboratoryStepsPageBreadcrumb(Laboratory $laboratory): array
    {
        return $this->getLaboratoryItem() + $this->getLaboratoryEditItem($laboratory) + $this->getLaboratoryStepsItem($laboratory);
    }
    private function getLaboratoryStepCreatePageBreadcrumb(Laboratory $laboratory): array
    {
        return $this->getLaboratoryItem() +
            $this->getLaboratoryEditItem($laboratory) +
            $this->getLaboratoryStepsItem($laboratory) +
            $this->getLaboratoryStepCreateItem($laboratory);
    }
    private function getLaboratoryStepEditPageBreadcrumb(Laboratory $laboratory, LaboratoryStep $laboratoryStep): array
    {
        return $this->getLaboratoryItem() +
            $this->getLaboratoryEditItem($laboratory) +
            $this->getLaboratoryStepsItem($laboratory) +
            $this->getLaboratoryStepEditItem($laboratory, $laboratoryStep);
    }

    private function getPharmacologicalArticleEditPageBreadcrumb(PharmacologicalArticle $article): array
    {
        return $this->getPharmacologicalArticleItem() + $this->getPharmacologicalArticleEditItem($article);
    }
    private function getVideoEditPageBreadcrumb(Video $video): array
    {
        return $this->getVideoItem() + $this->getVideoEditItem($video);
    }

    private function getLaboratoryCreatePageBreadcrumb(): array
    {
        return $this->getLaboratoryItem() + $this->getLaboratoryCreateItem();
    }

    private function getPharmacologicalArticleCreatePageBreadcrumb(): array
    {
        return $this->getPharmacologicalArticleItem() + $this->getPharmacologicalArticleCreateItem();
    }
    private function getVideoCreatePageBreadcrumb(): array
    {
        return $this->getVideoItem() + $this->getVideoCreateItem();
    }
    private function getStudentsPageItem(): array
    {
        return [route('admin.students-page') => 'Студенты'];
    }
    private function getTeachersPageItem(): array
    {
        return [route('admin.teachers-page') => 'Преподаватели'];
    }
    private function getGroupsPageItem(): array
    {
        return [route('admin.groups-page') => 'Группы'];
    }
}
