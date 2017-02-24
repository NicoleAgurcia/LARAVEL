<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Ticket;
use App\Mailers\AppMailer;
use App\User;
use Illuminate\Support\Facades\DB;


class TicketsController extends Controller
{

	public function __construct(){
   		$this->middleware('auth');
	}

	public function create(){
	    $categories = Category::all();

	    return view('tickets.ticket', compact('categories'));
	}

	public function userTickets(){
	    $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
	    $categories = Category::all();

	    return view('tickets.user_tickets', compact('tickets', 'categories'));
	}

	public function show($ticket_id){
	    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
    	$comments = $ticket->comments;
    	$category = $ticket->category;
   		return view('tickets.show', compact('ticket', 'category', 'comments'));
	}

	public function index(){
	    $tickets = Ticket::paginate(10);
	    $categories = Category::all();

	    return view('tickets.index', compact('tickets', 'categories'));
	}


	public function AllTickets(){
		if (Auth::user()->is_admin) {
			$opentickets_user = Ticket::where('status', 'Open')->count();
			$closetickets_user = Ticket::where('status', 'Closed')->count();
			$total_user = $closetickets_user + $opentickets_user;
		}else{
			$opentickets_user = Ticket::where([['user_id', Auth::user()->id],['status', 'Open']])->count();
			$closetickets_user = Ticket::where([['user_id', Auth::user()->id],['status', 'Closed']])->count();
			$total_user = $closetickets_user + $opentickets_user;
		}
		return view('home', ['closetickets_user'=> $closetickets_user ,'opentickets_user'=>$opentickets_user, 'All_Tickets'=> $total_user]);
	}


	public function close($ticket_id, AppMailer $mailer){
	    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
	    $ticket->status = 'Closed';
	    $ticket->save();
	    $ticketOwner = $ticket->user;
	    $mailer->sendTicketStatusNotification($ticketOwner, $ticket);
	    return redirect()->back()->with("status", "The ticket has been closed.");
	}

	public function store(Request $request, AppMailer $mailer){
	    $this->validate($request, [
	            'title'     => 'required',
	            'category'  => 'required',
	            'priority'  => 'required',
	            'message'   => 'required'
	        ]);

	        $ticket = new Ticket([
	            'title'     	=> $request->input('title'),
	            'user_id'   	=> Auth::user()->id,
	            'ticket_id' 	=> strtoupper(str_random(10)),
	            'category_id'  	=> $request->input('category'),
	            'priority'  	=> $request->input('priority'),
	            'message'   	=> $request->input('message'),
	            'status'    	=> "Open",
	        ]);

	        $ticket->save();

	        $mailer->sendTicketInformation(Auth::user(), $ticket);

	        return redirect()->back()->with("status", "A ticket with ID: #$ticket->ticket_id has been opened.");
	}


}
