<?php
    $q = mysqli_query($sql, "SELECT * FROM `h_levels`");
    $levels = [];
    while ($w1 = mysqli_fetch_array($q)) {
        $levels[] = $w1;
    }
    $levels_json = json_encode($levels, JSON_UNESCAPED_UNICODE);
?>
<script src="/scripts/script.js"></script>
<script>
    let levelselect = <?php if (isset($_GET["level"])) {echo $_GET["level"];} else {echo 1;}?>;
    let group = <?php if (isset($_GET["group"])) {echo $_GET["group"];} else {echo 1;}?>;
    function loadgame() {
        levels = <?php echo $levels_json; ?>;
        let group = 1;
        let menu_obj = document.querySelector(".game-page__menu-level");
        let menu_obj_items = "";
        let groups = [];
        for(let x in levels) {
            if (groups.indexOf(Number(levels[x]["group_"])) < 0) {
                groups.push(Number(levels[x]["group_"]));
            }
        }
        for (let y in groups) {
            menu_obj_items += "<ul class='menu-ul'>";
            for(let x in levels) {
                if (Number(levels[x]["group_"]) == groups[y]) {
                    if (levels[x].number == levelselect && levels[x]["group_"] == group) {
                    menu_obj_items += `<li><div class="game-menu-item select" data-level="${levels[x].number}" data-group="${levels[x]["group_"]}">${levels[x].number}</div></li>`;
                    } else {
                        menu_obj_items += `<li><div class="game-menu-item" data-level="${levels[x].number}" data-group="${levels[x]["group_"]}">${levels[x].number}</div></li>`;
                    }
                }
            }
            menu_obj_items += "</ul>";
        }
        loadsaves();
        menu_obj.innerHTML = menu_obj_items;
    }
</script>
<style class="gamestyle"></style>
<div class="container">
        <div class="game__body">
        <div class="game-page">
            <div class="game-page__header">
                <h1 class="titlegame">Mouse Hunting CSS</h1>
                <div class="game-page__menu">
                    <div class="game-page__menu-left blocked"></div>
                    <div class="game-page__menu-centre"><p>Уровень 1 из 12</p><div class="arrow-down"></div></div>
                    <div class="game-page__menu-right"></div>
                    <div class="game-page__menu-level close">
                    </div>
                </div>
            </div>
            <div class="leveltext"></div>
            <div class="code-area">
                <div class="code-area__numbers"></div>
                <div class="code-area__write">
                    <div class="levelobj">
                        
                    </div>
                    <div class="button-next blocked">Следующий</div>
                </div>
            </div>
            <div class="game-page__links">
                <p>Игра Mouse Hunting CSS - это образовательная платформа, созданная для обучения CSS Flexbox</p>
            </div>
        </div>
        <div class="game-display">
            
        </div>
        </div>
    </div>