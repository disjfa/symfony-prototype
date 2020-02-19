<?php

namespace App\Controller\Admin;

use App\Faker\NewsFaker;
use App\Form\Type\NewsFormType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("admin/news", name="admin_news_index")
     * @param NewsFaker $newsFaker
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(NewsFaker $newsFaker, PaginatorInterface $paginator, Request $request)
    {
        $news = $newsFaker->get(46);

        return $this->render('admin/news/index.html.twig', [
            'news' => $paginator->paginate($news, $request->query->getInt('page', 1), 10, [
                PaginatorInterface::DEFAULT_SORT_FIELD_NAME => 'datePublished',
                PaginatorInterface::DEFAULT_SORT_DIRECTION => 'desc',
            ]),
        ]);
    }

    /**
     * @Route("admin/news/view", name="admin_news_view")
     * @param NewsFaker $newsFaker
     * @return Response
     */
    public function view(NewsFaker $newsFaker)
    {
        return $this->render('admin/news/view.html.twig', [
            'item' => current($newsFaker->get(1)),
        ]);
    }
    /**
     * @Route("admin/news/delete", name="admin_news_delete")
     * @param NewsFaker $newsFaker
     * @return Response
     */
    public function delete(NewsFaker $newsFaker)
    {
        return $this->render('admin/news/delete.html.twig', [
            'item' => current($newsFaker->get(1)),
        ]);
    }

    /**
     * @Route("admin/news/edit", name="admin_news_edit")
     * @param NewsFaker $newsFaker
     * @param Request $request
     * @return Response
     */
    public function edit(NewsFaker $newsFaker, Request $request)
    {
        $news = $newsFaker->get(1);

        $form = $this->createForm(NewsFormType::class, current($news));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->addFlash('success', 'Form saved');
            return $this->redirectToRoute('admin_news_view');
        }

        return $this->render('admin/news/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
