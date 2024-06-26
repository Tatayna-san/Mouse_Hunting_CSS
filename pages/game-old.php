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
                        <ul class="menu-ul">
                            <li><div class="game-menu-item select">1</div></li>
                            <li><div class="game-menu-item">2</div></li>
                            <li><div class="game-menu-item">3</div></li>
                            <li><div class="game-menu-item">4</div></li>
                            <li><div class="game-menu-item">5</div></li>
                            <li><div class="game-menu-item">6</div></li>
                            <li><div class="game-menu-item">7</div></li>
                            <li><div class="game-menu-item">8</div></li>
                            <li><div class="game-menu-item">9</div></li>
                            <li><div class="game-menu-item">10</div></li>
                            <li><div class="game-menu-item">11</div></li>
                            <li><div class="game-menu-item">12</div></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="leveltext level-1 levelobj visible" id="first">
                <p>Помоги котику Сэму и его друзьям поймать мышей! Для этого тебе предстоит пройти 12 уровней, изучая основы языка CSS. Давай скорее начнем!</p>
                <p>Чтобы направить котика в нужном направлении используй свойство <span class="text-select">justify-content</span>, которое выравнивает элементы в контейнере горизонтально и принимает следующие значения:</p>
                <ul>
                    <li><span class="text-select">flex-start</span>: элементы выравниваются по левой стороне контейнера.</li>
                    <li><span class="text-select">flex-end</span>: элементы выравниваются по правой стороне контейнера.</li>
                    <li><span class="text-select">center</span>: элементы выравниваются по центру контейнера.</li>
                    <li><span class="text-select">space-between</span>: элементы отображаются с одинаковыми отступами между ними.</li>
                    <li><span class="text-select">space-around</span>: элементы отображаются с одинаковыми отступами вокруг них.</li>
                </ul>
                <p>Например, <span class="text-select">justify-content: flex-end;</span> сдвинет котика вправо. Не забудьте в конце точку с запятой <span class="text-select">;</span></p>
            </div>
            <div class="leveltext level-2 levelobj hidden">
                <p>Используй свойство <span class="text-select">justify-content</span> еще раз, чтобы помочь котикам поймать мышей. Помни, что это свойство выравнивает элементы горизонтально.</p>
            </div>
            <div class="leveltext level-3 levelobj hidden">
                <p>Итак, уровни становиться сложнее, а значит пора познакомиться с новым свойством <span class="text-select">align-items</span>. Это свойство CSS выравнивает элементы вертикально и принимает следующие значения:</p>
                <ul>
                    <li><span class="text-select">flex-start</span>: элементы выравниваются по верхнему краю контейнера.</li>
                    <li><span class="text-select">flex-end</span>: элементы выравниваются по нижнему краю контейнера.</li>
                    <li><span class="text-select">center</span>: элементы выравниваются вертикально по центру контейнера.</li>
                    <li><span class="text-select">baseline</span>: элементы отображаются на базовой линии контейнера.</li>
                    <li><span class="text-select">stretch</span>: элементы растягиваются, чтобы заполнить контейнер.</li>
                </ul>
            </div>
            <div class="leveltext level-4 levelobj hidden">
                <p>Котикам нужно поймать свою добычу в том порядке, в котором располагаются мышки, используя <span class="text-select">flex-direction</span>. Это свойство CSS задает направление, в котором будут расположены элементы в контейнере, и принимает следующие значения:</p>
                <ul>
                    <li><span class="text-select">row</span>: элементы размещаются по направлению текста, слева направо</li>
                    <li><span class="text-select">row-reverse</span>: элементы отображаются справа налево</li>
                    <li><span class="text-select">column</span>: элементы располагаются сверху вниз.</li>
                    <li><span class="text-select">column-reverse</span>: элементы располагаются снизу вверх.</li>	
                </ul>
                <p>При изменении направления, свойства <span class="text-select">justify-content</span> и <span class="text-select">align-items</span> меняются местами</p>
            </div>
            <div class="leveltext level-5 levelobj hidden">
                <p>Помоги котикам добраться до своих мышек с помощью <span class="text-select">flex-direction</span>, <span class="text-select">justify-content</span> и <span class="text-select">align-items</span>.</p>
            </div>
            <div class="leveltext level-6 levelobj hidden">
                <p>Чтобы поменять порядок отображения элементов, мы можем использовать свойство <span class="text-select">order</span> для конкретных элементов. По умолчанию, значение этого свойства у элементов равно 0, но мы можем задать положительное или отрицательное целое число этому свойству. Используй свойство order, чтобы направить котиков к своим мышкам.</p>
            </div>
            <div class="leveltext level-7 levelobj hidden">
                <p>Ещё одно свойство, которое ты можешь применить к определенному элементу — это <span class="text-select">align-self</span>. Это свойство принимает те же значения, что и <span class="text-select">align-items</span>, но задаёт эти свойства одному конкретному элементу</p>
            </div>
            <div class="leveltext level-8 levelobj hidden">
                <p>О нет! Котиков сплющило на одном ряду. Раздвинь их с помощью свойства <span class="text-select">flex-wrap</span>, которое принимает следующие значения:</p>
                <ul>
                    <li><span class="text-select">nowrap</span>: размеры элементов устанавливаются автоматически, чтобы они поместились в один ряд.</li>
                    <li><span class="text-select">wrap</span>: элементы автоматически переносятся на новую строку.</li>
                    <li><span class="text-select">wrap-reverse</span>: элементы автоматически переносятся на новую строку, но строки расположены в обратном порядке.</li>
                </ul>
            </div>
            <div class="leveltext level-9 levelobj hidden">
                <p>Два свойства <span class="text-select">flex-direction</span> и <span class="text-select">flex-wrap</span> используются так часто вместе, что было создано свойство <span class="text-select">flex-flow</span> для их комбинирования. Это свойство принимает их значения, разделённые пробелом.</p>
                <p>Например, ты можешь использовать <span class="text-select">flex-flow: row wrap</span>, чтобы элементы располагались в ряд и автоматически переносились на новую строку.</p>
                <p>Сделай так, чтобы котики стояли в столбик и переносились в другой столбец</p>
            </div>
            <div class="leveltext level-10 levelobj hidden">
                <p>Итак, мы уже подходим к концу. Осталось изучить последнее свойство <span class="text-select">align-content</span>, которое отвечает за расстояние между рядами. У него следующие значения: </p>
                <ul>
                    <li><span class="text-select">flex-start</span>: ряды группируются в верхней части контейнера.</li>
                    <li><span class="text-select">flex-end</span>: ряды группируются в нижней части контейнера.</li>
                    <li><span class="text-select">center</span>: ряды группируются вертикально по центру контейнера.</li>
                    <li><span class="text-select">space-between</span>: ряды отображаются с одинаковыми расстояниями между ними.</li>
                    <li><span class="text-select">space-around</span>: ряды отображаются с одинаковыми расстояниями вокруг них.</li>
                    <li><span class="text-select">stretch</span>: ряды растягиваются, чтобы заполнить контейнер равномерно.</li>
                    <p>Для использования <span class="text-select">align-content</span> нужно свойство <span class="text-select">flex-wrap: wrap</span></p>
                </ul>
            </div>
            <div class="leveltext level-11 levelobj hidden">
                <p>Котики немного растерялись во время охоты. Используй комбинацию <span class="text-select">flex-direction</span> и <span class="text-select">align-content</span>, чтобы направить их к своим мышкам.</p>
            </div>
            <div class="leveltext level-12 levelobj hidden">
                <p>Ты отлично постарался! А теперь покажи чему научился и помоги котикам в последний раз поохотиться, используя свойства CSS, которые ты выучил:</p>
                <ul>
                    <li><span class="text-select">justify-content</span></li>
                    <li><span class="text-select">align-items</span></li>
                    <li><span class="text-select">flex-direction</span></li>
                    <li><span class="text-select">order</span></li>
                    <li><span class="text-select">align-self</span></li>
                    <li><span class="text-select">flex-wrap</span></li>
                    <li><span class="text-select">flex-flow</span></li>
                    <li><span class="text-select">align-content</span></li>
                </ul>
            </div>
            <div class="code-area">
                <div class="code-area__numbers"><p> 1 2 3 4 5 6 7 8 9 10 11 12 13</p></div>
                <div class="code-area__write">
                    <div class="level-1 levelobj visible">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area1" class="code-input level-1" rows="1" onchange="inpchange(this)" id="lineone"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-2 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area2" class="code-input level-2" rows="1" onchange="inpchange(this)" id="linetwo"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-3 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area3" class="code-input level-3" rows="1" onchange="inpchange(this)" id="linethree"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-4 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area4" class="code-input level-4" rows="2" onchange="inpchange(this)" id="linefour"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-5 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area5" class="code-input level-5" rows="3" onchange="inpchange(this)" id="linefive"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-6 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area6" class="code-input level-6" rows="1" onchange="inpchange(this)" id="linesix"></textarea>
                        <p>&#125;</p>
                        <p>.cat1 &#123;</p>
                        <textarea name="line-area6cat1" class="code-input level-6" rows="1" onchange="inpchange(this)" id="lineseven"></textarea>
                        <p>&#125;</p>
                        <p>.cat2 &#123;</p>
                        <textarea name="line-area6cat2" class="code-input level-6" rows="1" onchange="inpchange(this)" id="lineeight"></textarea>
                        <p>&#125;</p>
                        <p>.cat3 &#123;</p>
                        <textarea name="line-area6cat3" class="code-input level-6" rows="1" onchange="inpchange(this)" id="linenine"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-7 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <p style="margin-left: 32px;">justify-content: space-between;</p>
                        <p>&#125;</p>
                        <p>.cat1 &#123;</p>
                        <textarea name="line-area7cat1" class="code-input level-7" rows="1" onchange="inpchange(this)" id="lineten"></textarea>
                        <p>&#125;</p>
                        <p>.cat2 &#123;</p>
                        <textarea name="line-area7cat2" class="code-input level-7" rows="1" onchange="inpchange(this)" id="lineeleven"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-8 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area8" class="code-input level-8" rows="1" onchange="inpchange(this)" id="linetwelve"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-9 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area9" class="code-input level-9" rows="1" onchange="inpchange(this)" id="linethirteen"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-10 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area10" class="code-input level-10" rows="2" onchange="inpchange(this)" id="linefourteen"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-11 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <p style="margin-left: 32px;">flex-wrap: wrap;</p>
                        <textarea name="line-area11" class="code-input level-11" rows="2" onchange="inpchange(this)" id="linefiveteen"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="level-12 hidden levelobj">
                        <p>.container &#123;</p>
                        <p style="margin-left: 32px;">display: flex;</p>
                        <textarea name="line-area12" class="code-input level-12" rows="5" onchange="inpchange(this)" id="linesixteen"></textarea>
                        <p>&#125;</p>
                    </div>
                    <div class="button-next blocked">Следующий</div>
                </div>
            </div>
            <div class="game-page__links">
                <p>Игра Mouse Hunting CSS создана "..." Нужно заполнить текстом</p>
            </div>
        </div>
        <div class="game-display">
            <div class="gamearea area1 level-1 levelobj visible">
                <div class="cat cat1 nofood level-1"></div>
                <div class="mousecontainer level-1" style="justify-content: end">
                    <div class="mouse level-1"></div>
                </div>
            </div>
            <div class="gamearea area2 level-2 levelobj hidden">
                <div class="cat cat1 nofood level-2"></div>
                <div class="mousecontainer level-2" style="justify-content: center">
                    <div class="mouse level-2"></div>
                </div>
            </div>
            <div class="gamearea area3 level-3 levelobj hidden">
                <div class="cat nofood level-3"></div>
                <div class="mousecontainer level-3" style="align-items: end;">
                    <div class="mouse level-3"></div>
                </div>
            </div>
            <div class="gamearea area4 level-4 levelobj hidden">
                <div class="cat nofood level-4"></div>
                <div class="cat nofood level-4"></div>
                <div class="mousecontainer level-4" style="flex-direction: column; align-items: end;">
                    <div class="mouse level-4"></div>
                    <div class="mouse level-4"></div>
                </div>
            </div>
            <div class="gamearea area5 level-5 levelobj hidden">
                <div class="cat nofood level-5"></div>
                <div class="cat nofood level-5"></div>
                <div class="mousecontainer level-5" style="flex-direction: column; align-items: center; justify-content: end">
                    <div class="mouse level-5"></div>
                    <div class="mouse level-5"></div>
                </div>
            </div>
            <div class="gamearea area6 level-6 levelobj hidden" style="justify-content: space-between;">
                <div class="cat nofood level-6 area6cat1 typecat type1"></div>
                <div class="cat cat-2 nofood level-6 area6cat2 typecat type2"></div>
                <div class="cat cat-3 nofood level-6 area6cat3 typecat type3"></div>
                <div class="mousecontainer level-6" style="align-items: end; justify-content: space-between">
                    <div class="mouse level-6 typecat type1" style="order: 3"></div>
                    <div class="mouse level-6 mouse-2 typecat type2" style="order: 1"></div>
                    <div class="mouse level-6 mouse-3 typecat type3" style="order: 2"></div>
                </div>
            </div>
            <div class="gamearea area7 level-7 levelobj hidden" style="justify-content: space-between;">
                <div class="cat area7cat1 nofood level-7"></div>
                <div class="cat area7cat2 nofood level-7" style="left: 50%"></div>
                <div class="mousecontainer level-7" style="justify-content: space-between">
                    <div class="mouse level-7" style="align-self: center;"></div>
                    <div class="mouse level-7" style="align-self: end;"></div>
                </div>
            </div>
            <div class="gamearea area8 level-8 levelobj hidden">
                <div class="cat area8cat1 nofood level-8"></div>
                <div class="cat area8cat2 nofood level-8"></div>
                <div class="cat area8cat1 nofood level-8"></div>
                <div class="cat area8cat2 nofood level-8"></div>
                <div class="cat area8cat1 nofood level-8"></div>
                <div class="cat area8cat2 nofood level-8"></div>
                <div class="mousecontainer level-8" style="flex-wrap: wrap">
                    <div class="mouse level-8"></div>
                    <div class="mouse level-8"></div>
                    <div class="mouse level-8"></div>
                    <div class="mouse level-8"></div>
                    <div class="mouse level-8"></div>
                    <div class="mouse level-8"></div>
                </div>
            </div>
            <div class="gamearea area9 level-9 levelobj hidden">
                <div class="cat nofood level-9"></div>
                <div class="cat nofood level-9"></div>
                <div class="cat nofood level-9"></div>
                <div class="cat nofood level-9"></div>
                <div class="cat nofood level-9"></div>
                <div class="cat nofood level-9"></div>
                <div class="mousecontainer level-9" style="flex-wrap: wrap; flex-direction: column">
                    <div class="mouse level-9"></div>
                    <div class="mouse level-9"></div>
                    <div class="mouse level-9"></div>
                    <div class="mouse level-9"></div>
                    <div class="mouse level-9"></div>
                    <div class="mouse level-9"></div>
                </div>
            </div>
            <div class="gamearea area10 level-10 levelobj hidden">
                <div class="cat nofood level-10"></div>
                <div class="cat nofood level-10"></div>
                <div class="cat nofood level-10"></div>
                <div class="cat nofood level-10"></div>
                <div class="cat nofood level-10"></div>
                <div class="cat nofood level-10"></div>
                <div class="mousecontainer level-10" style="flex-wrap: wrap; align-content: center;">
                    <div class="mouse level-10"></div>
                    <div class="mouse level-10"></div>
                    <div class="mouse level-10"></div>
                    <div class="mouse level-10"></div>
                    <div class="mouse level-10"></div>
                    <div class="mouse level-10"></div>
                </div>
            </div>
            <div class="gamearea area11 level-11 levelobj hidden" style="flex-wrap: wrap;">
                <div class="cat nofood level-11"></div>
                <div class="cat nofood level-11"></div>
                <div class="cat nofood level-11"></div>
                <div class="mousecontainer level-11" style="flex-wrap: wrap; align-content: end; justify-content: space-between;">
                    <div class="mouse level-11"></div>
                    <div class="mouse level-11"></div>
                    <div class="mouse level-11"></div>
                </div>
            </div>
            <div class="gamearea area12 level-12 levelobj hidden">
                <div class="cat nofood level-12"></div>
                <div class="cat nofood level-12"></div>
                <div class="cat nofood level-12"></div>
                <div class="cat nofood level-12"></div>
                <div class="mousecontainer level-12" style="flex-wrap: wrap; align-content: end; flex-direction: column; justify-content: flex-end;">
                    <div class="mouse level-12"></div>
                    <div class="mouse level-12"></div>
                    <div class="mouse level-12"></div>
                    <div class="mouse level-12"></div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="scripts/levelcontrol.js" type="module"></script>
    <script src="scripts/code-translate.js"></script>