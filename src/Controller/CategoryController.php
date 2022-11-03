<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="app_category")
     */
    public function index(CategoryRepository  $categoryRepository): Response
    {
        $getCategory = $categoryRepository->getCategory();
        $find = $categoryRepository->find($id = 3);
        $findAll = $categoryRepository->findAll();
        $findBy = $categoryRepository->findBy(["name"=>"Hikaye"]);
        $findOneBy = $categoryRepository->findOneBy(["name"=>"Hikaye"]);
        dump($find);
        dump($findAll);
        dump($findBy);
        dump($findOneBy);
        exit();
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }

    /**
     * @Route ("/new-category", name="new_category")
     * @param CategoryRepository $categoryRepository
     */
    public function newCategory(CategoryRepository $categoryRepository)
    {
        $newCategory = $categoryRepository->newCategory();
        dump($newCategory);
        exit();
    }

    /**
     * @Route ("/get-single-show-category/{id}", name="get_single_show_category")
     * @param CategoryRepository $categoryRepository
     * @param $id
     */
    public function getSingleShowCategory(CategoryRepository $categoryRepository, $id)
    {
        $getSingleShowCategory = $categoryRepository->getShowSingleCategory($id);
        dump($getSingleShowCategory["data"]);
        exit();
    }

    /**
     * @Route("/update-category/{id}", name="update_category")
     * @param CategoryRepository $categoryRepository
     * @param $id
     */
    public function updateCategory(CategoryRepository $categoryRepository, $id)
    {
        $postData["setName"] = "Masal";
        $updateCategory = $categoryRepository->updateCategory($id, $postData);
        dump($updateCategory);
        exit();
    }

    /**
     * @Route("/delete-category/{id}", name="delete_category")
     * @param CategoryRepository $categoryRepository
     * @param $id
     */
    public function deleteCategory(CategoryRepository $categoryRepository, $id)
    {
        $delete = $categoryRepository->deleteCategory($id);
        dump($delete);
        exit();
    }

}
