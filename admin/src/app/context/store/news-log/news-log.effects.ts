import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { NewsLogApiService } from "src/app/api";
import { newsLogActions as actions } from "./news-log.actions";

@Injectable()
export class NewsLogEffects {
    constructor(private actions$: Actions,
                private api: NewsLogApiService
    ) {
    }

    loadNewsLogs$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getNewsLogs().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
