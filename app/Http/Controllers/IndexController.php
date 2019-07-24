<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Tour;
use App\CarDriver;
use App\Region;
use App\Page;
use Illuminate\Support\Facades\Route;
use Mail;
use App\Restaurant;
use App\Residence;
use App\TourType;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $hotels = Residence::with('images')->where('residence_type',20)->inRandomOrder()->take(10)->orderBy('id', 'desc')->get();
        $tours = Tour::with('region')->whereSightseeingPlace(0)->take(10)->inRandomOrder()->orderBy('id', 'desc')->get();
        $cars = CarDriver::with('sliderImages')->take(10)->inRandomOrder()->orderBy('id', 'desc')->get();
        $settings = \App\Setting::first();
        return view('site.index', compact('tours','cars', 'hotels','settings'));
    }
//    public function index()
//    {
//        $hotels = collect();
//        Residence::with('images')
//            ->where('residence_type',20)
//            ->inRandomOrder()
//            ->orderBy('id', 'desc')
//            ->chunk(4, function ($q) use ($hotels) {
//                $hotels->push($q);
//            });
//        $tours = Tour::with('region')->whereSightseeingPlace(0)->take(10)->inRandomOrder()->orderBy('id', 'desc')->get();
//        $cars = CarDriver::with('sliderImages')->take(10)->inRandomOrder()->orderBy('id', 'desc')->get();
//        $settings = \App\Setting::first();
//        return view('site.index2', compact('tours','cars', 'hotels','settings'));
//    }

    public function contact()
    {
        $model = Page::whereSlug('contact')->firstOrFail();
        return view('site.contact', compact('model'));
    }

    public function region($region)
    {
        $model = Region::with('tours')->whereSlug($region)->firstOrFail();
        return view('site.region',compact('model'));
    }

    public function regionsAll()
    {
        $model = Region::get();
        return view('site.regions-all', compact('model'));
    }

    public function tour($region,$tour)
    {
        $model = \App\Tour::whereSlug($tour)
            ->firstOrFail();
     
        return view('site.tour', compact('model'));
    }

    public function restaurantSingle($slug)
    {
        $model = Restaurant::whereSlug($slug)->with('images')->firstOrFail();
        return view('site.restaurant_single', compact('model'));
    }

    public function news()
    {
        $image = \App\Gallery::wherePage('news')->firstOrFail()->image;
        $model = \App\News::orderBy('id', 'desc')->paginate(10);
        return view('site.news-all', compact('model', 'image'));
    }
    
    public function news_page($slug)
    {
        $model = \App\News::whereSlug($slug)->firstOrFail();
        return view('site.news', compact('model'));
    }

    public function about()
    {
        $model = Page::whereSlug('about')->firstOrFail();
        return view('site.about', compact('model'));
    }

    public function apartmentSingle($slug)
    {
        $model = Residence::whereSlug($slug)->whereResidenceType(Residence::residence_type_apartment)->firstOrFail();
        return view('site.apartments.apartment-single', compact('model'));
    }
    public function hostelSingle($slug)
    {
        $model = Residence::whereSlug($slug)->whereResidenceType(Residence::residence_type_hostel)->firstOrFail();
        return view('site.hostels.hostel-single', compact('model'));
    }

    public function hotelSingle($slug)
    {
        $model = Residence::whereSlug($slug)->whereResidenceType(Residence::residence_type_hotel)->firstOrFail();
        return view('site.hotels.hotel-single', compact('model'));
    }

    public function holiday()
    {
        $model = Page::whereSlug('holiday')->firstOrFail();
        return view('site.holiday', compact('model'));
    }

    public function vacancy()
    {
        $model = \App\Vacancy::orderBy('id', 'desc')->paginate(4);
        $image = \App\Gallery::wherePage('vacancy')->firstOrFail()->image;
        return view('site.vacancy', compact('model', 'image'));
    }

    public function service()
    {
        $model = \App\Service::orderBy('id', 'desc')->paginate(4);
        $image = \App\Gallery::wherePage('service')->firstOrFail()->image;
        return view('site.service', compact('model', 'image'));
    }

    public function driverSingle($id)
    {
        $model = \App\CarDriver::findOrFail($id);
        return view('site.driver-single', compact('model'));
    }

    public function tours(Request $request, $slug)
    {
        $model = \App\TourType::whereSlug($request->slug)->firstOrFail();
        $tours = $model->tours();
        if(isset($request->region)) {
            $tours = $tours->where('region_id', $request->region);
        }
        if(isset($request->range_val)) {
            $tours = $tours->where('price', $request->range_val);
        }

        $tours = $tours->paginate(6);

        $activeParentTourType = $model->parentTourType;
        $locale = 'name_'.App::getLocale();
        $region = \App\Region::select($locale,'id')->get();
        foreach($region as $item){
            $item->lang = $locale;
        }
        return view('site.tours', compact('model', 'tours', 'activeParentTourType','region'));
    }

    public function tourSingle(Request $request, $slug)
    {
        $model = \App\Tour::whereSlug($slug)
            ->firstOrFail();
        $settings = Setting::first();
        return view('site.special-tour', compact('model', 'settings'));
    }

    public function carSingle($slug)
    {
        $model = \App\CarDriver::whereSlug($slug)
            ->firstOrFail();
        $settings = Setting::first();

        return view('site.driver-single', compact('model','settings'));
    }

    public function aboutarm()
    {
        $model = \App\Page::whereSlug('aboutarm')->firstOrFail();
        return view('site.armenia', compact('model'));
    }

    public function nocontent()
    {
        return view('site.nocontent');
    }

    public function reserveTour($id, $key, $type)
    {
        $model = \App\Tour::findOrFail($id);
        $data = $model->meta_data['data'][$key];
        return view('site.reserve', compact('model', 'data', 'type'));
    }

    public function reserveCar($id, $key, $type)
    {
        $model = \App\CarDriver::findOrFail($id);
        $data = $model->meta_data[$key];
        return view('site.reserve-car', compact('model', 'data', 'type'));
    }

    public function reserveResidence($id, $key, $type)
    {
        $model = \App\Residence::findOrFail($id);
        $data = $model->meta_data['data'][$key];
        return view('site.reserve-residence', compact('model', 'data', 'type'));
    }

    public function reserveHotel($id, $row, $key)
    {
        $model = \App\Residence::findOrFail($id);
        $data = $model->meta_data[0];
        $roomType = \App\RoomType::find($data['data'][$row][0])->name;

        $duration = $data['dates'][$key - 1];
        $price = $data['data'][$row][$key];
        return view('site.reserve-hotel', compact('model', 'roomType', 'duration', 'price'));
    }

    public function sendContact(Request $request)
    {
        $data = $request->all();
        Mail::send('site.mails.contact', ['data' => $data], function ($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->to(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->subject("Land Of Noah Travel Agency");
        });
        return redirect()->route('view.index')->with('success-message-send', 200);
    }

    public function sendTourMail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
        ]);

        $data = $request->all();
        Mail::send('site.mails.index', ['data' => $data], function ($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->to($data['email'], $data['name']);
            $message->bcc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->cc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->subject("Land Of Noah Travel Agency");
        });
        return redirect()->route('view.index')->with('success-mail-send', 200);
    }

    public function sendDriverMail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
        ]);
        $data = $request->all();

        Mail::send('site.mails.car-driver', ['data' => $data], function ($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->to($data['email'], $data['name']);
            $message->bcc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->cc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->subject("Land Of Noah Travel Agency");
        });
        return redirect()->route('view.index')->with('success-mail-send', 200);
    }

    public function sendResidenceMail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);
        $data = $request->all();
        Mail::send('site.mails.residence', ['data' => $data], function ($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->to($data['email'], $data['name']);
            $message->bcc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->cc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->subject("Land Of Noah Travel Agency");
        });
        return redirect()->route('view.index')->with('success-mail-send', 200);
    }

    public function sendHotelMail(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
        ]);
        $data = $request->all();
        Mail::send('site.mails.hotel', ['data' => $data], function ($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->to($data['email'], $data['name']);
            $message->bcc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->cc(env('MAIL_FROM_ADDRESS'), 'LandOfNoah.com');
            $message->subject("InAndOut Travel Agency");
        });
        return redirect()->route('view.index')->with('success-mail-send', 200);
    }

    public function sightSeeingPlacesAll(Request $request)
    {
        if($request->slug) {
            $slug = $request->slug;
            $region = \App\Region::whereSlug($request->slug)->first();
            $places = \App\Tour::where([
                ['sightseeing_place', '=', 1],
                ['region_id', '=', $region->id]
            ])->orderBy('id', 'desc')->paginate(6);
            $places->appends(['slug' => $request->slug]);
        } else {
            $places = \App\Tour::whereSightseeingPlace(1)->paginate(6);
            $slug = false;
        }
        if($request->keywords) {
            $places = \App\Tour::where([['name_en', 'like', '%' . $request->keywords . '%'], ['sightseeing_place', '=', 1]])
                ->orWhere([['name_ru', 'like', '%' . $request->keywords . '%'], ['sightseeing_place', '=', 1]])
                ->orWhere([['name_hy', 'like', '%' . $request->keywords . '%'], ['sightseeing_place', '=', 1]])
                ->orderBy('id', 'desc')->paginate(8);

            $places->appends(['keywords' => $request->keywords]);
        }

        $list = \App\Region::with('sightseeing_places')->get();
        $image = \App\Gallery::wherePage('sightseeing-places')->first()->image;
        return view('site.sightseeing-places-all', compact(/*'region',*/ 'places', 'list', 'slug', 'image'));
    }

    public function restaurantsAll(Request $request)
    {
        if($request->slug) {
            $slug = $request->slug;
            $region = \App\Region::whereSlug($request->slug)->first();
            $restaurants = \App\Restaurant::where([
                ['region_id', '=', $region->id]
            ])->orderBy('id', 'desc')->paginate(6);
            $restaurants->appends(['slug' => $request->slug]);
        } else {
            $restaurants = \App\Restaurant::paginate(6);
            $slug = false;
        }

        if($request->keywords) {
            $restaurants = \App\Restaurant::where([['name_en', 'like', '%' . $request->keywords . '%']])
                ->orWhere([['name_ru', 'like', '%' . $request->keywords . '%']])
                ->orWhere([['name_hy', 'like', '%' . $request->keywords . '%']])
                ->orderBy('id', 'desc')->paginate(6);
            $restaurants->appends(['keywords' => $request->keywords]);
        }

        $list = \App\Region::with('restaurants')->orderBy('id', 'desc')->get();
        $image = \App\Gallery::wherePage('restaurants')->firstOrFail()->image;

        return view('site.restaurants-all', compact(/*'region',*/ 'restaurants', 'list', 'slug', 'image'));
    }

    public function apartmentsAll(Request $request)
    {
        if($request->slug) {
            $slug = $request->slug;
            $region = \App\Region::whereSlug($request->slug)->firstOrFail();
            $apartments = \App\Residence::where([
                ['region_id', '=', $region->id], ['residence_type', '=', \App\Residence::residence_type_apartment]
            ])->orderBy('id', 'desc')->paginate(6);
            $apartments->appends(['slug' => $request->slug]);
        } else {
            $apartments = \App\Residence::whereResidenceType(\App\Residence::residence_type_apartment)->orderBy('id', 'desc')->paginate(6);
            $slug = false;
        }

        if($request->keywords) {
            $apartments = \App\Residence::where([['name_en', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_apartment]])
                ->orWhere([['name_ru', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_apartment]])
                ->orWhere([['name_hy', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_apartment]])
                ->orderBy('id', 'desc')->paginate(6);

            $apartments->appends(['keywords' => $request->keywords]);
        }

        $image = \App\Gallery::wherePage('apartment')->firstOrFail()->image;
        $list = \App\Region::with('apartments')->orderBy('id', 'desc')->get();
        return view('site.apartments.apartments-all', compact(/*'region',*/ 'apartments', 'list', 'slug', 'image'));
    }

    public function hotelsAll(Request $request)
    {
        if($request->slug) {
            $slug = $request->slug;
            $region = \App\Region::whereSlug($request->slug)->first();
            $hotels = \App\Residence::where([
                ['region_id', '=', $region->id],
                ['residence_type', '=', \App\Residence::residence_type_hotel]
            ])->orderBy('id', 'desc')->paginate(6);
            $hotels->appends(['slug' => $request->slug]);
        } else {
            $hotels = \App\Residence::whereResidenceType(\App\Residence::residence_type_hotel)->orderBy('id', 'desc')->paginate(6);
            $slug = false;
        }

        if($request->keywords) {
            $hotels = \App\Residence::where([['name_en', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hotel]])
                ->orWhere([['name_ru', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hotel]])
                ->orWhere([['name_hy', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hotel]])
                ->orderBy('id', 'desc')->paginate(6);

            $hotels->appends(['keywords' => $request->keywords]);
        }

        $list = \App\Region::with('hotels')->orderBy('id', 'desc')->get();
        $image = \App\Gallery::wherePage('hotel')->firstOrFail()->image;
        $rooms = \App\RoomType::
        return view('site.hotels.hotels-all', compact(/*'region',*/ 'hotels', 'list', 'slug', 'image'));
    }
    public function hostelsAll(Request $request)
        {
            if($request->slug) {
                $slug = $request->slug;
                $region = \App\Region::whereSlug($request->slug)->firstOrFail();
                $hostels = \App\Residence::where([
                    ['region_id', '=', $region->id],
                    ['residence_type', '=', \App\Residence::residence_type_hostel]
                ])->orderBy('id', 'desc')->paginate(6);
                $hostels->appends(['slug' => $request->slug]);
            } else {
                $hostels = \App\Residence::whereResidenceType(\App\Residence::residence_type_hostel)->orderBy('id', 'desc')->paginate(6);
                $slug = false;
            }
            if($request->keywords) {
                $hostels = \App\Residence::where([['name_en', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hostel]])
                    ->orWhere([['name_ru', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hostel]])
                    ->orWhere([['name_hy', 'like', '%' . $request->keywords . '%'], ['residence_type', '=', \App\Residence::residence_type_hostel]])
                    ->orderBy('id', 'desc')->paginate(6);

                $hostels->appends(['keywords' => $request->keywords]);
            }

            $list = \App\Region::with('hostels')->orderBy('id', 'desc')->get();
            $image = \App\Gallery::wherePage('hostel')->firstOrFail()->image;
//            dd('test');
            return view('site.hostels.hostels-all', compact(/*'region',*/ 'hostels', 'list', 'slug', 'image'));
        }

    public function drivers(Request $request)
    {
        $query = [];
        $appends = [];
        if (isset($request->with_driver)) {
            array_push($query, ['with_driver', '=', $request->with_driver]);
            array_push($appends, ['with_driver' => $request->with_driver]);
        }
        if ($request->num_of_seats) {
            array_push($query, ['num_of_seats', '=', $request->num_of_seats]);
            array_push($appends, ['num_of_seats' => $request->num_of_seats]);
        }
        if ($request->vehicle_type_id) {
            array_push($query, ['vehicle_type_id', '=', $request->vehicle_type_id]);
            array_push($appends, ['vehicle_type_id' => $request->vehicle_type_id]);
        }

        $model = \App\CarDriver::where($query);

        if ($request->keywords) {
            array_push($appends, ['keywords' => $request->keywords]);
            $model->where('name_en', 'like', '%' . $request->keywords . '%')
                ->orWhere('name_ru', 'like', '%' . $request->keywords . '%')
                ->orWhere('name_hy', 'like', '%' . $request->keywords . '%');
        }

        $model = $model->orderBy('id', 'desc')->paginate(6)->appends($appends);

        $num_of_seats_lists = array_unique(\App\CarDriver::all('num_of_seats')->pluck('num_of_seats')->toArray());
        $image = \App\Gallery::wherePage('driver')->firstOrFail()->image;
        return view('site.drivers', compact('model', 'image', 'num_of_seats_lists', 'request'));
    }
}
