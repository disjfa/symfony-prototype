<?php


namespace App\Controller\Api;


use App\Faker\CalendarFaker;
use DateTime;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendarController
{
    /**
     * @Route("api/calendar", name="api_calendar_index")
     * @param Request $request
     * @param CalendarFaker $calendarFaker
     * @return Response
     * @throws Exception
     */
    public function index(Request $request, CalendarFaker $calendarFaker)
    {
        $start = new DateTime($request->query->get('start'));
        $end = new DateTime($request->query->get('end'));

        return new JsonResponse($calendarFaker->get($start, $end));
    }
}
