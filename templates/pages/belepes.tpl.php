<style>
    header nav ul li:hover {
        border-bottom: 2px solid;
    }
    header nav ul li.active {
        color: #fff9fb;
        font-weight: bold;
    }
    footer nav ul li:hover {
        color: #fff9fb;
        border-bottom: 1px solid;
    }
</style>
    <form action = "?oldal=belep" method = "post">
      <div class="belep" id="belepes" >
        <fieldset>
        <legend>Bejelentkezés</legend>
        <br>
        <input type="text" name="felhasznalo" placeholder="felhasználó" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
      </div>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h2>

    <form action = "?oldal=regisztral" method = "post">
        <div class="regiszt" id="regisztral" >
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="vezeteknev" placeholder="vezetéknév" required><br><br>
        <input type="text" name="utonev" placeholder="utónév" required><br><br>
        <input type="text" name="felhasznalo" placeholder="felhasználói név" required><br><br>
        <input type="password" name="jelszo" placeholder="jelszó" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
        <br>&nbsp;
      </fieldset>
        </div>
    </form>

