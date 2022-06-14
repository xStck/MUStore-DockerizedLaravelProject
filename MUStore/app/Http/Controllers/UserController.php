<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //Wyświetlenie menu edycji danych użytkownika
    public function showEditMenu(User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc edytować dane użytkownika.');
        }
        //jeśli użytkownik próbuje wejść do menu edycji nieswoich danych, to wróć na stronę główną z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz edytować danych użytkownika.');
        }

        return view('pages.editUserMenu', ['user' => $user]); //wyświetlenie menu edycji danych z przekazaniem użytkownika jako argument
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Edycja imienia i nazwiska użytkownika
    public function edit(User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc edytować dane użytkownika.');
        }
        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz edytować danych użytkownika.');;
        }

        //przejście do view edycji imienia oraz nazwiska użytkownika, z przekazaniem użytkownika jako argument
        return view('pages.basicUserData', ['user' => $user]);
    }

    //Edycja e-mail użytkownika
    public function editEmail(User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc zmienić adres e-mail.'); //jeśli użytkownik nie jest zalogowany to wróć do strony głównej
        }
        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz zmienić adresu e-mail.');;
        }

        return view('pages.emailUserData', ['user' => $user]); //przejście do view edycji adresu e-mail użytkownika, z przekazaniem użytkownika jako argument
    }

    //Edycja hasła użytkownika
    public function editPassword(User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc zmienić hasło.'); //jeśli użytkownik nie jest zalogowany to wróć do strony głównej
        }
        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz zmienić hasła.');;
        }

        return view('pages.passwordUserData', ['user' => $user]); //przejście do view edycji hasła użytkownika, z przekazaniem użytkownika jako argument
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Aktualizacja w bazie danych po zmianie imienia i nazwiska
    public function update(Request $request, User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc edytować dane użytkownika.');
        }
        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz edytować danych użytkownika.');;
        }
        //walidacja nowego imienia i nazwiska
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'alpha'],
            'surname' => ['required', 'string', 'max:255', 'alpha'],
        ]);
        //pobranie danych przekazanych w argumencie $request
        $data = $request->all();
        //jeśli udało się zaktualizować dane użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
        if ($user->update($data)) {
            return back()->with('success', 'Dane zostały zmienione poprawnie');
        } else { //jesli nie udało się zaktualizować danych użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
            return back()->with('success', 'Wystąpił błąd.');
        }
    }

    //Aktualizacja w bazie danych po zmianie hasła
    public function updatePassword(Request $request, User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc zmienić hasło.');
        }
        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz zmienić hasła.');;
        }
        //walidacja nowego hasła
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^.*(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[\d])(?=.*[\W]).*$/'],
        ]);
        //pobranie danych przekazanych w argumencie $request
        $data = $request->all();
        //haszowanie hasła
        $data['password'] = Hash::make($data['password']);

        //jeśli udało się zaktualizować dane użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
        if ($user->update($data)) {
            return back()->with('success', 'Hasło zostały zmienione poprawnie');
        } else { //jesli nie udało się zaktualizować danych użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
            return back()->with('success', 'Wystąpił błąd.');
        }
    }

    //Aktualizacja w bazie danych po zmianie e-mail
    public function updateEmail(Request $request, User $user)
    {
        //jeśli użytkownik nie jest zalogowany to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user() == null) {
            return redirect(' ')->with('success', 'Zaloguj się by móc zmienić adres e-mail.'); //jeśli użytkownik nie jest zalogowany to wróć do strony głównej
        }

        //jesli użytkownik próbuje edytować nie swoje dane to wróć do strony głównej z odpowiednim komunikatem
        if (Auth::user()->id != $user->id) {
            return redirect(' ')->with('success', 'Nie możesz zmienić adresu e-mail.');;
        }
        //walidacja nowego adresu e-mail
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        //pobranie danych przekazanych w argumencie $request
        $data = $request->all();
        //jeśli udało się zaktualizować dane użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
        if ($user->update($data)) {
            return back()->with('success', 'E-mail został zmieniony poprawnie');
        } else { //jesli nie udało się zaktualizować danych użytkownika (w bazie danych, encja: 'users'), to wróć do wcześniejszej strony z wyświetleniem odpowiedniego komunikatu
            return back()->with('success', 'Wystąpił błąd.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
