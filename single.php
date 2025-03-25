                            <div class="flex flex-col gap-4 justify-between">
                                <?php
                                $count = 0; // Inicializa o contador

                                foreach ($vocacional as $profissao => $dados) {
                                    $profissao = ucfirst($profissao); // Capitaliza a primeira letra

                                    if ($dados['contagem'] > 1) {
                                        $fontesUnicas = array_unique($dados['fontes']);
                                        echo '<div>' . "<strong>$profissao</strong>: {$dados['contagem']} vezes, em: " . implode(', ', $fontesUnicas) . '</div>';
                                        $count++; // Incrementa o contador
                                    }
                                }
                                ?>
                            </div>
